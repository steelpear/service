<template>
  <v-container>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="items"
      item-key="comment_ID"
      show-select
      class="mt-4 mb-2"
      :search="search"
      no-data-text="Отзывов пока нет"
      :loading="loading"
      loading-text="Отзывы загружаются"
      no-results-text="Не найдено"
      :footer-props="{
        itemsPerPageOptions: [25,50,100,-1],
        itemsPerPageText: 'Строк на страницу',
        itemsPerPageAllText: 'Все'
      }"
    >
      <template #top>
        <v-row>
          <v-switch
            v-model="publicSelect"
            :label="publicSelect ? 'Опубликованные' : 'Не опубликованные'"
            class="pa-3"
            @change="goFilter"
          />
          <v-spacer />
          <v-col cols="12" xs="12" sm="6" md="3">
            <v-text-field
              v-model="search"
              append-icon="mdi-magnify"
              label="Поиск"
              single-line
              hide-details
              clearable
            />
          </v-col>
        </v-row>
      </template>
      <template #[`item.comment_date`]="{ item }">
        {{ new Date(item.comment_date).toLocaleString("ru", {
          year: 'numeric',
          month: 'numeric',
          day: 'numeric'
        }) }}
      </template>
    </v-data-table>
    <v-btn icon nuxt to="/" class="mr-4">
      <v-icon>mdi-home</v-icon>
    </v-btn>
    <v-btn text :disabled="selected.length < 1 || publicSelect" @click="Public">
      Опубликовать
    </v-btn>
    <v-btn text :disabled="selected.length < 1 || !publicSelect" @click="Hide">
      Скрыть
    </v-btn>
    <v-btn text :disabled="selected.length < 1" @click="Delete">
      Удалить
    </v-btn>
    <v-snackbar
      v-model="sended"
      multi-line
      timeout="3000"
      top
      dark
      rounded
      color="green darken-1"
    >
      <span class="text-body-1">{{ snackText }}</span>
      <template #action="{ attrs }">
        <v-btn
          dark
          icon
          v-bind="attrs"
          @click="sended = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
    <v-snackbar
      v-model="error"
      multi-line
      timeout="3000"
      top
      dark
      rounded
      color="red"
    >
      <span class="text-body-1">Ошибка!</span>
      <template #action="{ attrs }">
        <v-btn
          dark
          icon
          v-bind="attrs"
          @click="sended = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<script>
export default {
  middleware: 'auth',
  data () {
    return {
      loading: true,
      sended: false,
      error: false,
      snackText: '',
      publicSelect: false,
      search: '',
      selected: [],
      items: [],
      val: [],
      headers: [
        {
          text: 'Имя',
          align: 'start',
          sortable: false,
          value: 'comment_author'
        },
        { text: 'Город', value: 'comment_city' },
        { text: 'Дата', value: 'comment_date' },
        { text: 'Отзыв', value: 'comment_content', sortable: false },
        { text: 'Опубликован', value: 'comment_approved' }
      ]
    }
  },
  head () {
    return {
      title: 'Панель администратора'
    }
  },
  async mounted () {
    await this.getComments()
    this.items = await this.val
    this.goFilter()
  },
  methods: {
    async getComments () {
      const response = await this.$axios.post('/getcommentadmin.php', {
        limit: 10000,
        skip: 0
      })
      this.val = response.data
      this.loading = false
    },
    async goFilter () {
      this.selected = []
      this.items = await this.val
      this.items = this.items.filter(item => this.publicSelect ? item.comment_approved === '1' : item.comment_approved === '0')
    },
    async Public () {
      const ids = this.selected.map(item => item.comment_ID)
      const response = await this.$axios.post('/publiccomment.php', {ids})
      if (response.data) {
        await this.getComments()
        this.items = await this.val
        this.goFilter()
        this.snackText = 'Опубликовано'
        this.sended = true
      } else {
        this.error = true
      }
      this.selected = []
    },
    async Hide () {
      const ids = this.selected.map(item => item.comment_ID)
      const response = await this.$axios.post('/hidecomment.php', {ids})
      if (response.data) {
        await this.getComments()
        this.items = await this.val
        this.goFilter()
        this.snackText = 'Скрыто'
        this.sended = true
      } else {
        this.error = true
      }
      this.selected = []
    },
    async Delete () {
      const ids = this.selected.map(item => item.comment_ID)
      const response = await this.$axios.post('/delcomment.php', {ids})
      if (response.data) {
        await this.getComments()
        this.items = await this.val
        this.goFilter()
        this.snackText = 'Удалено'
        this.sended = true
      } else {
        this.error = true
      }
      this.selected = []
    }
  }
}
</script>
