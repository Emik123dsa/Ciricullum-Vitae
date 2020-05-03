<template>
  <div>
    <h4 is="sui-header" dividing v-bind:class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
      <sui-icon name="jenkins" />
      <sui-header-content>
        Back-End
        <sui-header-subheader>Back-End skills</sui-header-subheader>
      </sui-header-content>
    </h4>
    <sui-card-group :items-per-row="3" class="link">
      <sui-card
        v-for="(card ,i) in cards"
        :key="i"
        class="card-animation-wrapper link"
        :style="{ animationDelay: 0.1 * i + 's' }"
        @click.native="switchToSkill(card.link)"
      >
        <sui-card-content :style="{color: '#000'}">
          <sui-icon :name="`${card.icon}`" :color="`${card.color}`"></sui-icon>
          {{card.name}}
        </sui-card-content>
        <sui-image :style="{background: '#fff' }" :src="`${card.img}`" />
        <sui-card-content extra>
          <sui-button content="Read" label-position="left" :color="`${card.color}`">
            <a is="sui-label" slot="label" basic pointing="right" :color="`${card.color}`">
              <sui-icon name="book"></sui-icon>
            </a>
          </sui-button>
        </sui-card-content>
      </sui-card>
    </sui-card-group>
    <h4 is="sui-header" dividing v-bind:class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
      <sui-icon name="jenkins" />
      <sui-header-content>
        Front-End
        <sui-header-subheader>Front-End skills</sui-header-subheader>
      </sui-header-content>
    </h4>
    <sui-card-group class="link" :items-per-row="3">
      <sui-card
        v-for="(card_front ,i) in cards_front"
        :key="i"
        class="card-animation-wrapper link"
        :style="{animationDelay: 0.1 * i + 's'}"
        @click.native="switchToSkill(card_front.link)"
      >
        <sui-card-content :style="{color: '#000'}">
          <sui-icon :name="`${card_front.icon}`" :color="`${card_front.color}`"></sui-icon>
          {{card_front.name}}
        </sui-card-content>
        <sui-image :style="{background: '#fff' }" :src="`${card_front.img}`" />
        <sui-card-content extra>
          <sui-button content="Read" label-position="left" :color="`${card_front.color}`">
            <a is="sui-label" slot="label" basic pointing="right" :color="`${card_front.color}`">
              <sui-icon name="book"></sui-icon>
            </a>
          </sui-button>
        </sui-card-content>
      </sui-card>
    </sui-card-group>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cards: [
        {
          icon: "php",
          name: "PHP",
          img:
            "https://d2xzmw6cctk25h.cloudfront.net/profession/1/v2_image/medium-d47cd604456f886657c6c7adcfd80888.png",
          color: "blue",
          link: "/skills/php"
        },
        {
          icon: "laravel",
          name: "Laravel",
          img:
            "https://twodayweb.ru/wp-content/uploads/2016/02/laravel-logo.png",
          color: "red",
          link: "/skills/laravel"
        },
        {
          icon: "node",
          name: "Node.js",
          img: "https://miro.medium.com/max/900/1*vdnbwhsak73CHpy113Ljvw.png",
          color: "olive",
          link: "/skills/node-js"
        },
        {
          icon: "database",
          name: "MySql",
          img:
            "https://s3.us-east-2.amazonaws.com/upload-icon/uploads/icons/png/4943187881553750385-256.png",
          color: "blue",
          link: "/skills/database"
        },
        {
          icon: "docker",
          name: "Docker",
          img:
            "https://sanet.pics/storage-5/0719/X71KZLAD3VVBpvDk63panJSliuY4I0bF.jpg",
          color: "blue",
          link: "/skills/docker"
        }
      ],
      cards_front: [
        {
          icon: "vuejs",
          name: "Vue.js",
          img:
            "https://avatars.mds.yandex.net/get-pdb/1412649/705f077e-8467-431f-937d-7bd200c8eae8/s1200?webp=false",
          color: "green",
          link: "/skills/vue-js"
        },
        {
          icon: "js",
          name: "JavaScript",
          img:
            "https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png",
          color: "yellow",
          link: "/skills/js"
        },
        {
          icon: "webpack",
          name: "Webpack",
          img: "https://webpack.js.org/dcd5e077cf9f54ebe52d4f7ebe8c3080.png",
          color: "blue",
          link: "/skills/webpack"
        },
        {
          icon: "css3 alternate",
          name: "CSS3",
          img:
            "data:image/png;base64,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",
          color: "blue",
          link: "/skills/css3"
        },
        {
          icon: "html5",
          name: "HTML5",
          img:
            "data:image/png;base64,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",
          color: "red",
          link: "/skills/html5"
        }
      ]
    };
  },
  metaInfo: {
    title: "Skills"
  },
  methods: {
    switchToSkill(item) {
      this.$router.push(item);
    }
  }
};
</script>

<style lang="scss" scoped>
.card-animation-wrapper {
  animation: card ease 0.5s both;
}

.card-animation-wrapper {
  &:hover {
    //transform: translateY(-15px);
  }
}

.webpack {
  background: url("https://cdn.worldvectorlogo.com/logos/webpack.svg") no-repeat
    center center;
  background-size: contain;
}

@keyframes card {
  from {
    transform: translate3d(0, -30px, 0);
    opacity: 0;
  }

  to {
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}
</style>