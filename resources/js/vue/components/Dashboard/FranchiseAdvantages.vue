<template>
    <div class="franchise-advantage-container">
        <div class="franchise-advantage-item" v-for="advantage, index of advantages" :key="advantage.id">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" :name="`advantages[${ index }][name]`" v-model="advantage.name" placeholder="Преимущество" class="form-control">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-4">
                    <select :name="`advantages[${ index }][type]`" class="form-control">
                        <option :value="id" v-for="name, id of {1: 'Хорошо', 2: 'Плохо'}" :key="id" :selected="advantage.pivot.type == id">
                            {{ name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" :name="`advantages[${ index }][label]`" :value="advantage.pivot.label" placeholder="Значение" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" :name="`advantages[${ index }][is_main]`" :checked="advantage.pivot.is_main" class="custom-control-input" :id="`advantages_is_main${ index }`">
                        <label class="custom-control-label" :for="`advantages_is_main${ index }`">Основное преимущество</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="small text-danger" @click="remove(index)">
                            <i class="fal fa-fw fa-trash"></i>
                            Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" class="franchise-advantage-add" @click="add">
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
                advantages: [],
            }
        },
        computed: {},
        methods: {
            add() {
                this.advantages.push({
                    name: null,
                    pivot: {
                        type: 1,
                        label: null,
                        is_main: null,
                    }
                });
            },
            remove(index) {
                this.advantages.splice(index, 1);
            }
        },
        mounted() {
            this.$data.advantages = JSON.parse(this.$props.data);
        }
    }
</script>

<style lang="scss">
    .franchise-advantage {
        &-container {
            $gap: 4rem;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: $gap;
            grid-row-gap: $gap;
        }

        &-item {
            border-radius: 0.25rem;

            // &:nth-of-type(odd) {
            //     background: rgba($color: #FFF, $alpha: 0.75);
            // }
        }

        &-add {
            $color: #1cc88a;

            min-height: 116px;
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