<template>
  <v-container class="py-6">
    <v-row align="center" justify="center" class="mb-9">
      <v-tooltip right>
        <template #activator="{ on, attrs }">
          <v-btn
            x-large
            icon
            nuxt
            to="/"
            class="mr-4"
            v-bind="attrs"
            v-on="on"
          >
            <v-icon>mdi-home</v-icon>
          </v-btn>
        </template>
        <span>На главную</span>
      </v-tooltip>
      <v-spacer />
      <div class="text-center display-1">
        Отзывы наших клиентов
      </div>
      <v-spacer />
    </v-row>
    <div v-for="(item, i) in view" :key="i">
      <v-sheet height="100%" :class="$vuetify.breakpoint.mobile ? 'px-1 my-3' : 'px-16 my-3'">
        <v-row
          :class="{'fill-height' : $vuetify.breakpoint.mdAndUp, 'wrap' : i + 1 !== view.length}"
          align="center"
          justify="center"
        >
          <v-col cols="12" md="3" class="text-left">
            <div class="pt-1 title">
              {{ item.comment_author }}
            </div>
            <div class="caption">
              {{ item.comment_city }}
            </div>
            <div class="caption">
              {{ formatDate(item.comment_date) }}
            </div>
          </v-col>
          <v-col class="body-1">
            {{ item.comment_content }}
          </v-col>
        </v-row>
      </v-sheet>
    </div>
    <v-pagination
      v-if="items.length > limit"
      v-model="currentPage"
      class="my-4"
      :length="totalPages"
      @input="prepareView"
    />
  </v-container>
</template>

<script>
export default {
  data () {
    return {
      currentPage: 1,
      items: [],
      limit: 10,
      view: []
    }
  },
  computed: {
    totalPages () {
      return Math.ceil(this.items.length / this.limit)
    }
  },
  async mounted () {
    await this.getComments()
    this.prepareView()
  },
  methods: {
    async getComments () {
      const response = await this.$axios.post('/getcomment.php', {
        limit: 10000,
        skip: 0
      })
      this.items = response.data
    },
    formatDate (date) {
      const dat = new Date(date).toLocaleDateString('ru-ru')
      const dat1 = dat.slice(0, 6)
      const dat2 = dat.slice(6)
      const dat3 = dat1 + dat2
      return dat3
    },
    prepareView () {
      this.view = []
      const skp = (this.currentPage - 1) * this.limit
      this.view = this.items.slice(skp, this.limit + skp)
    }
  }
}
</script>

<style>
  .wrap {
    border-bottom: 1px solid lightgrey;
  }
</style>
