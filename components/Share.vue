<template>
  <section>
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
        { network: 'twitter', icon: 'fa-brands fa-x-twitter' },
        { network: 'telegram', icon: 'fa-brands fa-telegram' },
        { network: 'facebook', icon: 'fa-brands fa-facebook' },
        { network: 'vk', icon: 'fa-brands fa-vk' },
        { network: 'odnoklassniki', icon: 'fa-brands fa-odnoklassniki' },
        { network: 'whatsapp', icon: 'fa-brands fa-whatsapp' }
      ]
    }
  }
}
</script>
