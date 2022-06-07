<template>
  <section class="home">
    <h1 class="title">Формы</h1>
    <FormList v-for="form in forms" :key="form.id" :form="form" />
  </section>
</template>

<script>
import { Issues } from '../services/index'
import FormList from '../components/FormList.vue'

export default {
  components: { FormList },
  data() {
    return {
      forms: [],
      issues: new Issues(),
    }
  },
  mounted() {
    this.getForms()
  },
  methods: {
    async getForms() {
      try {
        const response = await this.issues.getForms()
        console.log(response.data)
        this.forms = response.data.result
      } catch (e) {
        console.log(e)
      }
    },
  },
}
</script>

<style lang="scss">
@import '@/assets/scss/index.scss';
</style>
