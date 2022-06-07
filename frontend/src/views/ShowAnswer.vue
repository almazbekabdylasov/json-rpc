<template>
  <h1 class="title">Ответы</h1>
  <div v-if="answers.length" class="answer">
    <div class="answer__item">
      <h3 class="answer__title">{{ formName }}</h3>
      <div v-for="answer in answers" :key="answer.id" class="answer__content">
        <div v-for="(value, name) in answer.answer" :key="name">
          <p>
            <span>{{ name }}:</span> {{ value }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="answer-not-fount">
    <h1 v-if="!answers.length" class="answer-not-fount__title">нету ответов</h1>
    <router-link
      v-if="!answers.length"
      :to="{ name: 'Form', params: { id: id } }"
      >заполнить</router-link
    >
    <router-link :to="{ name: 'Home' }"
      >вернуться на главную страницу</router-link
    >
  </div>
</template>

<script>
import { Issues } from '../services/index'

export default {
  props: ['id'],
  data() {
    return {
      issues: new Issues(),
      answers: [],
      formName: null,
    }
  },
  mounted() {
    this.get()
  },
  methods: {
    async get() {
      try {
        const response = await this.issues.getAnswer(this.id)
        this.answers = response.data.result.answers
        this.formName = response.data.result.form_name
      } catch (e) {
        console.log(e.reponse)
      }
    },
  },
}
</script>

<style lang="scss" scoped>
@import '@/assets/scss/index.scss';

.answer {
  margin-bottom: 25px;
  &__item {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
  }
  &__title {
    @include font(18px, 700, 1.5, #41546b);
    text-align: center;
    margin-bottom: 15px;
  }
  &__content {
    border-bottom: 1px solid #41546b;
    &:not(:last-child) {
      margin-bottom: 15px;
    }
    span {
      @include font(17px, 500, 1.5, #324152);
      margin-right: 8px;
    }
    p {
      @include font(15px, 400, 1.5, #5a728d);
      text-align: center;
    }
  }
  &-not-fount {
    & > *:not(:last-child) {
      margin-bottom: 20px;
    }
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    &__title {
      @include font(18px, 700, 1.5, #324152);
    }
    a {
      @include font(15px, 400, 1.5, white);
      cursor: pointer;
      text-transform: uppercase;
      background-color: #5457b6;
      padding: 10px 20px;
      border-radius: 5px;
      &:hover {
        background-color: hsl(239, 57%, 85%);
      }
      &:nth-child(3) {
        background-color: rgba(196, 12, 12, 0.764);
        &:hover {
          background-color: hsl(239, 57%, 85%);
        }
      }
    }
  }
}
</style>
