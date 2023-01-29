<template>
  <div class="container">
    <h1>{{ title }}</h1>
    <div class="row g-3 needs-validation">
      <div v-if="showAlert" class="d-inline p-2 bg-primary text-white">{{alertMessage}}</div>
      <div class="mb-3">
        <label for="exampleFormControlInput0" class="form-label">Имя</label>
        <input type="text" class="form-control" id="exampleFormControlInput0" placeholder="Ваше имя" v-model="newOrder.name">
        <message-validation-error :messageError="arrMessageError" name="newOrder.name"/>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Телефон</label>
        <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="83511231212" v-model="newOrder.phone">
        <message-validation-error :messageError="arrMessageError" name="newOrder.phone"/>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст заявки</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" v-model="newOrder.message"></textarea>
        <message-validation-error :messageError="arrMessageError" name="newOrder.message"/>
      </div>
      <div class="col-12">
        <div class="btn btn-primary" @click="saveOrder">Отправить заявку</div>
      </div>
    </div>
  </div>
</template>

<script>
import MessageValidationError from "./general/MessageValidationError";

export default {
  name: "Welcome",
  setup: () => ({
    title: 'Форма отправки заявки'
  }),
  components: {
    MessageValidationError,
  },
  data() {
    return {
      newOrder: {
        name: null,
        phone: null,
        message: null,
      },
      showAlert: false,
      alertMessage: 'Ваше сообщение успешно отправлено',
      arrMessageError: null
    }
  },
  methods: {
    saveOrder() {
      axios.post('/api/neworder',
        {
          newOrder: this.newOrder,
          headers: {
            'Content-Type': 'multipart/form-data',
          }
        }
      ).then(response => (
        this.clearOrder()
      )).catch((error) => (
        this.arrMessageError = error.response.data.errors
      ));
    },
    clearOrder(){
      this.newOrder.name = null
      this.newOrder.phone = null
      this.newOrder.message = null
      this.successMessage()
    },
    successMessage(){
      this.showAlert = true;
      setTimeout(() => {
        this.showAlert = false;
      }, 1000);
    }
  },
}
</script>

<style scoped>

</style>