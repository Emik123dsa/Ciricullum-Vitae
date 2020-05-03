<template>
  <sui-menu
    attached="top"
    :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }"
    v-bind:style="{border: this.$cookie.get('__at-es') === 'true' ? '1px solid #555 !important' : false}"
  >
    <sui-menu-menu position="left">
      <sui-dropdown item icon="cloud blue" simple>
        <sui-dropdown-menu>
          <sui-dropdown-item>
            <sui-icon name="dropdown" />
            <span class="text">
              <sui-icon size="mini" name="rss" link />Features
            </span>
            <sui-dropdown-menu>
              <sui-dropdown-item
                v-for="(feature, i) in features"
                :key="i"
                @click.prevent="switchFeatures(feature.path)"
              >
                <sui-icon size="mini" name="tag" link />
                {{feature.name}}
              </sui-dropdown-item>
            </sui-dropdown-menu>
          </sui-dropdown-item>
          <sui-dropdown-divider />
          <sui-dropdown-header>Socials</sui-dropdown-header>
          <sui-dropdown-item v-for="(social, i) in socials" :key="i" :to="`${social.path}`">
            <sui-icon size="mini" :name="`${social.img}`" link />
            {{social.name}}
          </sui-dropdown-item>
        </sui-dropdown-menu>
      </sui-dropdown>

      <router-link
        is="sui-menu-item"
        v-for="(item, i) in items"
        :key="i"
        :class="{active: isActive(item.name)}"
        :to="`${item.path}`"
        :content="item.name"
        @click.native="choose(`${item.name}`)"
      ></router-link>
    </sui-menu-menu>
    <sui-menu-menu position="right">
      <sui-menu-item right>
        <sui-checkbox
          toggle
          v-model="value"
          @click.native="switchTheme(value)"
          v-bind:disabled="active"
        />
      </sui-menu-item>
    </sui-menu-menu>
  </sui-menu>
</template>

<script>
export default {
  data() {
    return {
      items: [
        {
          name: "Home",
          path: "/"
        },
        {
          name: "Projects",
          path: "/projects"
        },
        {
          name: "Socials",
          path: "/socials"
        },
        {
          name: "Skills",
          path: "/skills"
        },
        {
          name: "Testimonial",
          path: "/testimonial"
        }
      ],
      features: [
        {
          name: "About me",
          path: "/about"
        },
        {
          name: "Personal",
          path: "/personal"
        },
        {
          name: "Contact me",
          path: "/feedback"
        },
        {
          name: "Socials",
          path: "/socials"
        },
        {
          name: "Testimonial",
          path: "/testimonial"
        }
      ],
      socials: [
        {
          name: "GitHub",
          path: "/github",
          img: "github"
        },
        {
          name: "LinkedIn",
          path: "/linkedin",
          img: "linkedin"
        },
        {
          name: "Xing",
          path: "/xing",
          img: "xing"
        },
        {
          name: "Stack Overflow",
          path: "/stackoverflow",
          img: "stack overflow"
        }
      ],
      activeItem: "",
      active_item: "",
      value: this.$cookie.get("__at-es") === "true" ? true : false,
      active: false
    };
  },
  computed: {},
  created() {
    this.active_item = this.$route.name;
    var theme__dark = this.$cookie.get("__at-es");

    if (!theme__dark) {
      this.$cookie.set("__at-es", false, { expires: "1Y" });
    }
  },
  methods: {
    switchTheme(value) {
      this.$cookie.set("__at-es", value, { expires: "1Y" });
      var loader = document.querySelector('.ui.vertical.segment');
      if (this.active != true) {
        this.active = true; 
        //loader.classList.add('loading');
        this.$router.go();
      }
    },
    isActive(item) {
      return this.active_item == item ? true : false;
    },
    choose(item) {
      this.active_item = item;
    },
    switchFeatures(item) {
      if (this.$route.path !== item) {
        this.$router.push(item);
      }
    }
  }
};
</script>

<style lang="css" scoped>

</style>