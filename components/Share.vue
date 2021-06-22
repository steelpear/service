<template>
  <section class="text-right">
    <ShareNetwork
      v-for="network in networks"
      :key="network.network"
      :network="network.network"
      :url="sharing.url"
      :title="sharing.title"
      :description="sharing.description"
      :quote="sharing.quote"
      :hashtags="sharing.hashtags"
      :twitter-user="sharing.twitterUser"
      class="mx-1"
    >
      <v-icon large>
        {{ network.icon }}
      </v-icon>
    </ShareNetwork>
  </section>
</template>

<script>
export default {
  data () {
    return {
      sharing: {
        url: 'http://xn--90abinbseqoie.xn--p1ai/',
        title: 'Ремонт мобильных телефонов в Керчи.',
        description: 'Сервис по ремонту мобильных телефонов в г.Керчь.',
        quote: 'Ремонт мобильных телефонов в Керчи.',
        hashtags: 'ремонтмобильных, сервис, ремонтпланшетов, Керчь',
        twitterUser: ''
      },
      networks: [
        { network: 'twitter', icon: 'mdi-twitter' },
        { network: 'telegram', icon: 'mdi-telegram' },
        { network: 'facebook', icon: 'mdi-facebook' },
        { network: 'vk', icon: 'mdi-vk' },
        { network: 'odnoklassniki', icon: 'mdi-odnoklassniki' },
        { network: 'whatsapp', icon: 'mdi-whatsapp' }
      ]
    }
  }
}
</script>
