<template>
  <v-container class="py-6">
    <div class="text-center display-1 mb-9">
      Отзывы наших клиентов
    </div>
    <div v-for="(item, i) in view" :key="i">
      <v-sheet height="100%" :class="$vuetify.breakpoint.mobile ? 'px-1 my-3' : 'px-16 my-3'">
        <v-row
          :class="{'fill-height' : $vuetify.breakpoint.mdAndUp, 'wrap' : i + 1 !== view.length}"
          align="center"
          justify="center"
        >
          <v-col cols="12" md="3" class="text-leftr">
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
      class="my-4"
      v-model="currentPage"
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
      limit: 20,
      skip: 0,
      view: []
    }
  },
  computed: {
    totalPages () {
      return Math.ceil(this.items.length / this.limit)
    }
  },
  mounted () {
    // this.getComments()
    this.items =
      [
        {
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '71',
          comment_author: 'Джастин',
          comment_avatar: '',
          comment_city: 'Лос-Анджелес',
          comment_author_email: '',
          comment_date: '2023-09-07 21:08:54',
          comment_content: 'Работая над проектом, мне пришлось создать специфичную «анкету соискателя» в котором надо была отправлять всю анкету на указные за ране e-mail адрес, и я сразу же вспомнил про PHP функцию mail().',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '70',
          comment_author: 'Генри',
          comment_avatar: '',
          comment_city: 'Нью-Йорк',
          comment_author_email: '',
          comment_date: '2023-09-07 21:07:08',
          comment_content: 'Реализация SMTP (только Windows) функции mail() в Windows во многом отличается от реализации в sendmail. Во-первых, она не использует локальную программу для составления писем, а работает непосредственно с сокетами, что означает что необходим почтовый агент (MTA), ожидающий соединений на сокете (может быть как на локальном так и на удалённом сервере).',
          comment_karma: '5',
          comment_approved: '1'
        },
        {
          comment_ID: '66',
          comment_author: 'Епифан',
          comment_avatar: '',
          comment_city: 'Рим',
          comment_author_email: '',
          comment_date: '2023-09-07 19:19:53',
          comment_content: 'Обратите внимание на предложение WHERE в синтаксисе обновления: Предложение WHERE указывает, какие записи или записи, которые должны быть обновлены. Если опустить предложение WHERE, все записи будут обновлены!',
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
          comment_ID: '1',
          comment_author: 'Наталья',
          comment_avatar: '',
          comment_city: 'Москва',
          comment_author_email: '',
          comment_date: '2022-08-08 05:30:24',
          comment_content: 'Приехала на отдых и случайно уронила свой iPhone в воду. Очень расстроилась. Нашла в интернете сайт этого сервисного центра. Ребята настоящие профессионалы. И хотя случай был довольно сложный - за сутки всё починили за вполне приемлемую цену. Рекомендую.',
          comment_karma: '5',
          comment_approved: '1'
        }
      ]
    this.prepareView()
  },
  methods: {
    async getComments () {
      const response = await this.$axios.post('/getcomment.php', {
        limit: this.limit,
        skip: this.skip
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
