<template>
    <div class="franchise-faq">
        <div class="franchise-faq__item" v-for="item, index of faq" :key="index">
            <h6 class="text-dark font-weight-bold mb-4">Вопрос №{{ index + 1 }}</h6>
            <div class="form-group">
                <label :for="`faq_question_${index}`">Вопрос</label>
                <input type="text" :name="`faq[${index}][question]`" :id="`faq_question_${index}`" class="form-control" placeholder="Вопрос" v-model.lazy="item.question">
            </div>
            <div class="form-group">
                <label :for="`faq_answer_${index}`">Ответ</label>
                <textarea :name="`faq[${index}][answer]`" :id="`faq_answer_${index}`" class="form-control" placeholder="Ответ" v-model.lazy="item.answer" rows="5"></textarea>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" :name="`faq[${ index }][is_active]`" :checked="item.is_active" class="custom-control-input" :id="`faq_active_${ index }`">
                        <label class="custom-control-label" :for="`faq_active_${ index }`">Активный</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="small text-danger" @click="remove(index)">
                            <i class="fal fa-fw fa-trash"></i>
                            Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0)" class="franchise-faq-add" @click="add">
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
                faq: [],
            }
        },
        methods: {
            add() {
                this.faq.push({
                    question: null,
                    answer: null,
                    is_active: true,
                });
            },
            remove(index) {
                this.faq.splice(index, 1);
            },
        },
        mounted() {
            this.$data.faq = JSON.parse(this.$props.data);
        }
    }
</script>

<style lang="scss">
    .franchise-faq {
        $gap: 4rem;

        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: $gap;
        grid-row-gap: $gap;

        &__item {
        }

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