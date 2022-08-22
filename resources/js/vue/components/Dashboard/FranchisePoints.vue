<template>
    <div class="franchise-points">

        <div class="franchise-points__item" v-for="point, index of points" :key="point">
            <div class="row" v-if="point.country_id === 1">
                <div class="col-md-6">
                    <Select2 :settings="{ ajax: getCityAjax, placeholder: 'Поиск города' }" @select="selectCity($event, index)" />

                    <div class="form-group mt-5">
                        <label :for="`point_city_${index}`">Город</label>
                        <input type="text" :name="`points[${index}][city]`" :id="`point_city_${index}`" v-model="point.city" class="form-control" readonly>
                    </div>

                    <input type="hidden" :name="`points[${index}][region]`" v-model="point.region">
                    <input type="hidden" :name="`points[${index}][geo_lat]`" v-model="point.geo_lat">
                    <input type="hidden" :name="`points[${index}][geo_lon]`" v-model="point.geo_lon">

                    <div class="form-row">
                        <div class="col-md-4">
                            <label :for="`point_own_points_${index}`">Собственные точки</label>
                            <input type="number" :name="`points[${index}][own_points]`" :id="`point_own_points_${index}`" class="form-control" placeholder="Собственные точки" v-model.lazy="point.own_points">
                        </div>
                        <div class="col-md-4">
                            <label :for="`point_franchise_points_${index}`">Франчайзинговые точки</label>
                            <input type="number" :name="`points[${index}][franchise_points]`" :id="`point_franchise_points_${index}`" class="form-control" placeholder="Франчайзинговые точки" v-model.lazy="point.franchise_points">
                        </div>
                        <div class="col-md-4">
                            <label :for="`point_repeat_points_${index}`">Повторные точки</label>
                            <input type="number" :name="`points[${index}][repeat_points]`" :id="`point_repeat_points_${index}`" class="form-control" placeholder="Повторные точки" v-model.lazy="point.repeat_points">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="javascript:void(0)" class="small text-danger" @click="remove(index)">
                            <i class="fal fa-fw fa-trash"></i>
                            Удалить
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="franchise-points__map" v-if="point.geo_lat && point.geo_lon">
                        <iframe :src="`https://yandex.ru/map-widget/v1/?ll=${point.geo_lon}%2C${point.geo_lat}&z=10`" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- <iframe :src="`https://maps.google.com/maps?q=${point.geo_lat},${point.geo_lon}&hl=ru&z=10&amp;output=embed`" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                </div>
                <div class="franchise-points__divider"></div>
            </div>
        </div>
        <a href="javascript:void(0)" class="btn btn-sm btn-success franchise-points-add" @click="add">
            <i class="fal fa-fw fa-plus"></i>
            Добавить город
        </a>

        <div class="my-5">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="international" :checked="international" v-model="i18l" :disabled="this.points.filter(item => item.country_id !== 1).length > 0">
                <label class="custom-control-label" for="international">Есть точки за рубежом</label>
            </div>
        </div>

        <div v-if="international">
            <div class="franchise-points__item" v-for="point, index of points" :key="point">
                <div class="row" v-if="point.country_id !== 1">
                    <div class="col-md-6">
                        <Select2 :settings="{ ajax: getCountryAjax, placeholder: 'Поиск страны' }" @select="selectCountry($event, index)" />

                        <div class="form-group mt-5">
                            <label :for="`point_city_${index}`">Страна</label>
                            <input type="text" :id="`point_city_${index}`" v-model="point.country.name" class="form-control" readonly>
                        </div>

                        <input type="hidden" :name="`points[${index}][country_id]`" v-model="point.country.id">
                        <input type="hidden" :name="`points[${index}][geo_lat]`" v-model="point.country.geo_lat">
                        <input type="hidden" :name="`points[${index}][geo_lon]`" v-model="point.country.geo_lon">

                        <div class="form-row">
                            <div class="col-md-4">
                                <label :for="`point_own_points_${index}`">Собственные точки</label>
                                <input type="number" :name="`points[${index}][own_points]`" :id="`point_own_points_${index}`" class="form-control" placeholder="Собственные точки" v-model.lazy="point.own_points">
                            </div>
                            <div class="col-md-4">
                                <label :for="`point_franchise_points_${index}`">Франчайзинговые точки</label>
                                <input type="number" :name="`points[${index}][franchise_points]`" :id="`point_franchise_points_${index}`" class="form-control" placeholder="Франчайзинговые точки" v-model.lazy="point.franchise_points">
                            </div>
                            <div class="col-md-4">
                                <label :for="`point_repeat_points_${index}`">Повторные точки</label>
                                <input type="number" :name="`points[${index}][repeat_points]`" :id="`point_repeat_points_${index}`" class="form-control" placeholder="Повторные точки" v-model.lazy="point.repeat_points">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="javascript:void(0)" class="small text-danger" @click="remove(index)">
                                <i class="fal fa-fw fa-trash"></i>
                                Удалить
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="franchise-points__map" v-if="point.country.geo_lat && point.country.geo_lon">
                            <iframe :src="`https://yandex.ru/map-widget/v1/?ll=${point.geo_lon}%2C${point.geo_lat}&z=10`" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- <iframe :src="`https://maps.google.com/maps?q=${point.country.geo_lat},${point.country.geo_lon}&hl=ru&z=10&amp;output=embed`" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        </div>
                    </div>
                    <div class="franchise-points__divider"></div>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn btn-sm btn-success franchise-points-add" @click="add(true)">
                <i class="fal fa-fw fa-plus"></i>
                Добавить страну
            </a>
        </div>
    </div>
</template>

<script>
    import Select2 from 'vue3-select2-component';

    export default {
        components: {
            Select2
        },
        props: [
            'data',
        ],
        data () {
            return {
                points: [],
                cities: [],
                countries: [],
                i18l: false,
            }
        },
        computed: {
            getCityAjax() {
                return {
                    url: '/api/v1/geo/getCity',
                    data: (params) => {
                        return {
                            value: params.term
                        };
                    },
                    dataType: 'json',
                    processResults: (data) => {
                        if (data.length > 0) {
                            this.cities = data;

                            // TODO Remove
                            console.info(data);

                            return {
                                results: data.map((item, i) => {
                                    return {
                                        id: i,
                                        text: item.value,
                                    };
                                }),
                            };
                        }
                    },
                    cache: true,
                };
            },
            getCountryAjax() {
                return {
                    url: '/api/v1/geo/getCountry',
                    data: (params) => {
                        return {
                            value: params.term,
                            without: [
                                'Россия',
                            ],
                        };
                    },
                    dataType: 'json',
                    processResults: (data) => {
                        if (data.length > 0) {
                            this.countries = data;

                            // TODO Remove
                            console.info(data);

                            return {
                                results: data.map((item, i) => {
                                    return {
                                        id: i,
                                        text: item.name,
                                    };
                                }),
                            };
                        }
                    },
                    cache: true,
                };
            },
            international() {
                return this.points.filter(item => item.country_id !== 1).length > 0 ? true : this.i18l;
            },
        },
        methods: {
            add(international = false) {
                this.points.push({
                    country_id: international === true ? null : 1,
                    city: null,
                    own_points: 0,
                    franchise_points: 0,
                    geo_lat: null,
                    geo_lon: null,
                    country: {
                        name: null,
                        geo_lon: null,
                        geo_lat: null,
                    },
                });
            },
            remove(index) {
                this.points.splice(index, 1);
            },
            getCity(index) {
                let value = this.points[index].city;

                axios(`/api/v1/geo/getCity?value=${value}`)
                    .then(result => {
                        let data = result.data;

                        this.points[index].city = data.city;
                        this.points[index].geo_lat = data.geo_lat;
                        this.points[index].geo_lon = data.geo_lon;
                    });
            },
            selectCity(event, index){
                let city = this.cities[event.id].data;
                let getRegion = data => {
                    if (data.region === 'Москва' || data.region === 'Московская') {
                        return 'Москва и область';
                    } else if (data.region === 'Санкт-Петербург' || data.region === 'Ленинградская') {
                        return 'Санкт-Петербург и область';
                    } else if (data.region_type === 'обл') {
                        return `${data.region} ${data.region_type_full}`;
                    } else {
                        return data.region;
                    }
                };

                this.points[index].city = city.city;
                this.points[index].region = getRegion(city);
                this.points[index].geo_lat = city.geo_lat;
                this.points[index].geo_lon = city.geo_lon;
            },
            selectCountry(event, index){
                let country = this.countries[event.id];

                this.points[index].country = country;
            }
        },
        mounted() {
            this.$data.points = JSON.parse(this.$props.data);
        }
    }
</script>

<style lang="scss">
    .franchise-points {
        &__divider {
            width: 100%;
            flex: 0 0 100%;
            margin: 2rem 0;
            max-width: 100%;
            border-bottom: 1px dashed #CCC;
        }

        &__map {
            iframe {
                border-radius: 0.5rem;
            }
        }
    }
</style>