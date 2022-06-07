<template>
  <template v-if="form">
    <div class="home__items">
      <div class="home-item">
        <h3 class="home-item__title">{{ form.name }}</h3>
        <div class="home-item__body">
          <router-link :to="{ name: 'Form', params: { id: form.form_uid } }">
            заполнить</router-link
          >
          <router-link :to="{ name: 'Answer', params: { id: form.form_uid } }">
            посмотреть</router-link
          >
        </div>
      </div>
    </div>
  </template>
</template>

<script>
export default {
  props: ['form'],
}
</script>

<style lang="scss">
@import '@/assets/scss/index.scss';

.home {
  &-item {
    background-color: #fff;
    padding: 25px;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    a {
      @include font(18px, 700, 1.5, white);
      background-color: #5457b6;
      border-radius: 5px;
      padding: 0 20px;
      &:not(:last-child) {
        margin-right: 15px;
      }
      &:hover {
        background-color: hsl(239, 57%, 85%);
      }
      &:nth-child(2) {
        background-color: rgba(196, 12, 12, 0.764);
        &:hover {
          background-color: hsl(0, 58%, 85%);
        }
      }
    }
    &__title {
      @include font(18px, 700, 1.5, #324152);
    }
    &__body {
      display: flex;
    }
  }
}
</style>
