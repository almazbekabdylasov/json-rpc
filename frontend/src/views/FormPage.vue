<template>
  <div v-if="!formDone" class="form">
    <form @submit.prevent="handleSubmit" class="form__content">
      <template v-if="form.inputs">
        <div v-for="inp in form.inputs" :key="inp.id" class="form__item">
          <label class="form__description">{{ inp.description }}</label>
          <input
            @input="onInput"
            :required="inp.name"
            :name="inp.name"
            :type="inp.type"
          />
        </div>
      </template>
      <template v-if="form.selects">
        <div v-for="select in form.selects" :key="select.id" class="form__item">
          <label class="form__description">{{ select.description }}</label>
          <select
            :value="this.info[select.name]"
            @input="onInput"
            required
            :name="select.name"
          >
            <option v-for="option in select.options" :key="option.id" required>
              {{ option.value }}
            </option>
          </select>
        </div>
      </template>
      <template v-if="form.inputs">
        <div v-for="item in form.textarea" :key="item.id" class="form__item">
          <label class="form__description">{{ item.description }}</label>
          <textarea @input="onInput" required :name="item.name"></textarea>
        </div>
      </template>
      <p v-if="errorField" class="form__error-text">{{ errorField }}</p>
      <button class="form__btn">click</button>
    </form>
  </div>
  <div v-else>Done</div>
</template>

<script>
import { Issues } from '../services/index'

export default {
  props: ['id'],
  data() {
    return {
      formDone: false,
      issues: new Issues(),
      form: {},
      info: {},
      selected: '',
      errorField: '',
    }
  },
  mounted() {
    this.getForm()
  },
  methods: {
    async getForm() {
      try {
        const response = await this.issues.getForm(this.id)
        this.form = response.data.result
      } catch (e) {
        console.log(e.response)
      }
    },
    onInput(e) {
      this.info[e.target.name] = e.target.value
    },
    async handleSubmit() {
      try {
        const response = await this.issues.saveForm(this.info, this.id)
        if (response.status === 200) {
          this.$router.push(`/showanswer/${this.id}`)
        }
      } catch (e) {
        console.log(e.response)
      }
    },
  },
}
</script>

<style lang="scss">
@import '@/assets/scss/index.scss';

.form {
  max-width: 730px;
  background-color: #fff;
  padding: 25px;
  border-radius: 10px;
  &__content {
    display: flex;
    flex-direction: column;
  }
  &__item {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
    input {
      margin-top: 15px;
      height: 10px;
      padding: 15px 12px;
      @include font(15px, 400, 1.5, #324152);
      // font-family: 'Rubik', sans-serif;
      // line-height: 1.5;
      // font-weight: 400;
      // color: #324152;
      border-radius: 5px;
      border: 1px solid #324152;
    }
    select {
      @include font(15px, 400, 1.5, #324152);
      margin-top: 15px;
      height: 35px;
      padding: 0 12px;
      border-radius: 5px;
      border: 1px solid #324152;
    }
    textarea {
      @include font(15px, 400, 1.5, #324152);
      margin-top: 15px;
      resize: none;
      width: 100%;
      height: 90px;
      box-sizing: border-box;
      padding: 15px 25px;
      border-radius: 5px;
      border: 1px solid #324152;
    }
  }
  &__description {
    @include font(15px, 500, 1.5, #67727e);
  }
  &__btn {
    @include font(15px, 400, 1.5, white);
    border: none;
    border-radius: 5px;
    outline: none;
    min-width: 104px;
    height: 48px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 20px;
    cursor: pointer;
    text-transform: uppercase;
    background-color: #5457b6;
    transition: all 0.3s;
    &:hover {
      background-color: hsl(239, 57%, 85%);
    }
  }
  &__error-text {
    @include font(15px, 400, 1.5, rgba(255, 0, 0, 0.716));
    text-align: center;
  }
}
</style>
