<template>
  <v-container>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="items"
      item-key="comment_ID"
      show-select
      class="mt-4"
      :search="search"
      no-data-text="Отзывов пока нет"
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
    <v-btn text :disabled="selected.length < 1 || publicSelect" @click="Public">
      Опубликовать
    </v-btn>
    <v-btn text :disabled="selected.length < 1 || !publicSelect" @click="Hide">
      Скрыть
    </v-btn>
    <v-btn text :disabled="selected.length < 1" @click="Delete">
      Удалить
    </v-btn>
  </v-container>
</template>

<script>
export default {
  middleware: 'auth',
  data () {
    return {
      publicSelect: false,
      search: '',
      selected: [],
      items: [],
      val: [
        {
          comment_ID: '1',
          comment_author: 'Наталья',
          comment_avatar: '',
          comment_city: 'Москва',
          comment_author_email: '',
          comment_date: '2022-08-08 05:30:24',
          comment_content: 'Приехала на отдых и случайно уронила свой iPhone в воду. Очень расстроилась. Нашла в интернете сайт этого сервисного центра. Ребята настоящие профессионалы. И хотя случай был довольно сложный - за сутки всё починили за вполне приемлемую цену. Рекомендую.',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '2',
          comment_author: 'Николай Любимов',
          comment_avatar: '',
          comment_city: 'Пермь',
          comment_author_email: '',
          comment_date: '2022-06-16 05:42:52',
          comment_content: 'Смартфон завис и выключился в самый неподходящий момент. Приехал специально из загородного пансионата в сервис. Хорошо, что удачно расположен - рядом с автовокзалом - быстро нашёл. Мастер посмотрел, сказал программа слетела, прошивать надо. За полчаса всё сделали и даже все контакты сохранили, что для меня очень важно. Хорошая работа, спасибо.',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '53',
          comment_author: 'Кузьма',
          comment_avatar: '',
          comment_city: 'Портленд',
          comment_author_email: '',
          comment_date: '2023-09-05 16:24:17',
          comment_content: 'All Ok!',
          comment_karma: '5',
          comment_approved: '0'
        }
      ],
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
    // await this.getComments()
    this.items = await this.val
    this.goFilter()
  },
  methods: {
    async getComments () {
      const response = await this.$axios.get('getcomment.php')
      this.val = response.data
    },
    async goFilter () {
      this.selected = []
      this.items = await this.val
      this.items = this.items.filter(item => this.publicSelect ? item.comment_approved === '1' : item.comment_approved === '0')
    },
    Public () {
      this.selected = []
    },
    Hide () {
      this.selected = []
    },
    Delete () {
      this.selected = []
    }
  }
}
</script>
