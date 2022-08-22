<template>
    <div class="franchise-requirements">
        <div class="franchise-requirements__item" v-for="item, index of requirements" :key="index">
            <h6 class="text-dark font-weight-bold mb-4">Таб №{{ index + 1 }}</h6>
            <div class="form-group">
                <label :for="`requirements_name_${index}`">Название</label>
                <input type="text" :name="`requirements[${index}][name]`" :id="`requirements_name_${index}`" class="form-control" placeholder="Название" v-model.lazy="item.name" required>
            </div>
            <div class="form-group">
                <label :for="`requirements_items_${index}`">Требования</label>
                <div v-if="item.items">
                    <div class="row" v-for="requirement, i of item.items" :key="requirement">
                        <div class="col-md-11">
                            <input type="text" :name="`requirements[${index}][items][${i}]`" class="form-control mb-3" placeholder="Требование" v-model.lazy="item.items[i]">
                        </div>
                        <div class="col-md-1">
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="btn btn-danger" @click="removeItem(index, i)">
                                    <i class="fal fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="javascript:void(0)" class="btn btn-sm btn-success" @click="addItem(index)">Добавить требование</a>
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-6">
                    <label :for="`requirements_file_${index}`">Файл</label>
                    <div class="custom-file">
                        <input type="file" :name="`requirements[${index}][file]`" class="custom-file-input" :id="`requirements_file_${index}`" accept=".eps,.pptx,.pdf">
                        <label class="custom-file-label" for="presentation">{{ item.media && item.media.length ? item.media[0].file_name : 'Выберите файл' }}</label>
                    </div>
                    <!-- <div class="custom-file__list">
                        <a href="javascript:void(0)" target="_blank" class="custom-file__item">
                            <div class="custom-file__icon" data-extension="...">
                                <i class="fal fa-fw fa-file"></i>
                            </div>
                            <div class="custom-file__name"></div>
                        </a>
                    </div> -->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label :for="`requirements_btn_${index}`">Текст кнопки</label>
                        <input type="text" :name="`requirements[${index}][button_caption]`" :id="`requirements_btn_${index}`" class="form-control" placeholder="Текст кнопки" v-model.lazy="item.button_caption">
                    </div>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="small text-danger" @click="remove(index)">
                            <i class="fal fa-fw fa-trash"></i>
                            Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" class="franchise-requirements-add" @click="add" v-if="allowed_amount">
            <i class="fal fa-fw fa-plus"></i>
            Добавить
        </a>
    </div>
</template>

<script>
    export default {
        props: [
            'data',
        ],
        data () {
            return {
                requirements: [],
            }
        },
        computed: {
            allowed_amount() {
                return this.requirements.length < 5;
            }
        },
        methods: {
            add() {
                if (this.allowed_amount) {
                    this.requirements.push({
                        name: null,
                        items: null,
                        button_caption: null,
                    });
                }
            },
            remove(index) {
                if (typeof this.requirements[index].id !== 'undefined' && confirm('Удалить таб?')) {
                    let id = this.requirements[index].id;

                    axios.delete('/api/v1/franchises/deleteRequirementById', {
                        params: {
                            id: id
                        }
                    });
                }

                this.requirements.splice(index, 1);
            },
            addItem(index) {
                if (this.requirements[index].items === null) {
                    this.requirements[index].items = [];
                }

                this.requirements[index].items.push([]);
            },
            removeItem(requirement, index) {
                this.requirements[requirement].items.splice(index, 1);
            },
        },
        mounted() {
            this.$data.requirements = JSON.parse(this.$props.data);
        }
    }
</script>

<style lang="scss">
    .franchise-requirements {
        $gap: 4rem;

        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: $gap;
        grid-row-gap: $gap;

        &-add {
            $color: #1cc88a;

            min-height: 300px;
            color: $color;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 1rem;
            border: 1px dashed $color;
            background-color: transparent;

            &:hover {
                color: #FFF;
                background-color: $color;
                text-decoration: none;
            }
        }
    }
</style>