<template>
    <div class="franchise-dynamic">
        <div class="franchise-dynamic__item" v-for="dynamic, index of dynamics" :key="dynamic">
            <input type="number" max="2022" maxlength="4" :name="`dynamics[${index}][year]`" v-model="dynamic.year" class="form-control" placeholder="Год">
            <input type="number" :name="`dynamics[${index}][count]`" class="form-control" v-model="dynamic.count" placeholder="Количество точек">
        </div>
    </div>
    <a href="javascript:void(0)" class="btn btn-sm btn-success franchise-dynamic-add" @click="add">
        <i class="fal fa-fw fa-plus"></i>
        Добавить год
    </a>
</template>

<script>
    export default {
        props: [
            'data',
        ],
        data () {
            return {
                dynamics: [],
            }
        },
        computed: {},
        methods: {
            add() {
                this.dynamics.push({
                    year: null,
                    count: null,
                });
            },
        },
        mounted() {
            this.$data.dynamics = JSON.parse(this.$props.data);
        }
    }
</script>

<style lang="scss">
    .franchise-dynamic {
        display: flex;
        flex-flow: column nowrap;

        &__item {
            margin-bottom: 2rem;
            display: flex;
            flex-flow: row nowrap;

            & > input {
                width: 25%;

                &:first-of-type {
                    margin-right: 1rem;
                }
            }
        }

        // &-add {
        //     $color: #1cc88a;

        //     color: $color;
        //     display: flex;
        //     justify-content: center;
        //     align-items: center;
        //     border-radius: 1rem;
        //     border: 1px dashed $color;
        //     background-color: transparent;

        //     &:hover {
        //         color: #FFF;
        //         background-color: $color;
        //         text-decoration: none;
        //     }
        // }
    }
</style>