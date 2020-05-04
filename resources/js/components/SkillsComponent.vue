<template >
  <div>
    <h4 is="sui-header" dividing v-bind:class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
      <sui-icon name="jenkins" />
      <sui-header-content>
        Back-End
        <sui-header-subheader>Back-End skills</sui-header-subheader>
      </sui-header-content>
    </h4>
    <sui-card-group :items-per-row="3" class="link" v-if="!loading">
      <sui-card
        v-for="(card ,i) in backCards"
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
    <div v-else>
       <lazy-card-loading />
    </div>
    <h4 is="sui-header" dividing v-bind:class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
      <sui-icon name="jenkins" />
      <sui-header-content>
        Front-End
        <sui-header-subheader>Front-End skills</sui-header-subheader>
      </sui-header-content>
    </h4>
    <sui-card-group class="link" :items-per-row="3" v-if="!loading">
      <sui-card
        v-for="(card_front ,i) in frontCards"
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
    <div v-else> 
       <lazy-card-loading />
    </div>
  </div>
</template>

<script>
import LazyCardLoading from './global/LazyCardLoading.vue';

export default {
  components: {
    LazyCardLoading
  },
  data() {
    return {
      skill_cards: [],
      loading: true
    };
  },
  metaInfo: {
    title: "Skills"
  },
  created() { 
    this.getSkillCards();
  },
  computed: {
    frontCards() {
      return this.skill_cards.filter(function (item) {
        return item.parent === "card_front";
      });
    },
    backCards() {
      return this.skill_cards.filter(function (item) {
        return item.parent === "card_back";
      });
    }
  },
  methods: {
    switchToSkill(item) {
      this.$router.push(item);
    },
    async getSkillCards() {
      this.loading = true; 
      await this.$store.dispatch("loadSkillCards");

      this.loading = false; 

      this.skill_cards = !!this.$store.getters.skillCards.data.data
        ? this.$store.getters.skillCards.data.data
        : "";
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