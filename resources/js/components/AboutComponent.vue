<template>
  <sui-item-group divided
  class="card-animation-wrapper"
  >
    <sui-item>
      <sui-item-image v-if="this.$cookie.get('__at-es') === 'false' ? true : false" size="small" class="photo_feature" src />
      <sui-item-content>
        <sui-item-header v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}">Emil Shari</sui-item-header>
        <sui-item-meta>
          <span class="price" v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}">Web & Developer</span>
        </sui-item-meta>
        <sui-item-description>
          <p v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}">
            Hello! My name is Emil.
            <br />I'm being a Full Stack Web Developer.
            <br />I'm experienced with essential strides of the commercial/self projects building and serving.
            <br />Currently, I'm trying to enhance myself in the Front End framework, as Vue.js/Nuxt.js, but simultaneously, actively programming in the Back End, as PHP and his frameworks as well. (Essentially, Laravel).
          </p>
        </sui-item-description>
      </sui-item-content>
    </sui-item>
    <sui-item>
      <h3 is="sui-header" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <sui-icon name="linux" />
        <sui-header-content>
          Programming stack:
          <sui-header-subheader>Let me count my professional programming skills quickly:</sui-header-subheader>
        </sui-header-content>
      </h3>
    </sui-item>
    <sui-item>
      <sui-list :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <sui-item>
          <sui-icon name="folder" color="blue"></sui-icon>
          <sui-item-content>
            <sui-item-header>Front-End</sui-item-header>
            <sui-list>
              <sui-item v-for="(item, i) in front" :key="i">
                <sui-icon size="large" :color="`${item.color}`" :name="`${item.img}`"></sui-icon>
                <sui-item-content>
                  <sui-item-header>{{item.name}}</sui-item-header>
                  <sui-item-description>{{item.description}}</sui-item-description>
                </sui-item-content>
              </sui-item>
            </sui-list>
          </sui-item-content>
        </sui-item>

        <sui-item>
          <sui-icon name="folder" color="red"></sui-icon>
          <sui-item-content>
            <sui-item-header>Back-End</sui-item-header>
            <sui-list>
              <sui-item v-for="(item, i) in back" :key="i">
                <sui-icon size="large" :color="`${item.color}`" :name="`${item.img}`"></sui-icon>
                <sui-item-content>
                  <sui-item-header>{{item.name}}</sui-item-header>
                  <sui-item-description>{{item.description}}</sui-item-description>
                </sui-item-content>
              </sui-item>
            </sui-list>
          </sui-item-content>
        </sui-item>

        <sui-item>
          <sui-icon size="large" name="linux" color="purple"></sui-icon>
          <sui-item-content>
            <sui-item-content>
              <sui-item-header>Kali Linux</sui-item-header>
              <sui-item-description>I work a plenty with Kali Linux for finding any vulnerabilities, like Sql Injections and so on</sui-item-description>
            </sui-item-content>
          </sui-item-content>
        </sui-item>

        <sui-item>
          <sui-icon size="large" name="github"></sui-icon>
          <sui-item-content>
            <sui-item-content>
              <sui-item-header>Github</sui-item-header>
              <sui-item-description>I'm actively using github for my projects deploying</sui-item-description>
            </sui-item-content>
          </sui-item-content>
        </sui-item>
      </sui-list>
    </sui-item>
  </sui-item-group>
</template>

<script>
export default {
  data() {
    return {
      front: [
        {
          name: "Vue.js",
          img: "vuejs",
          description:
            "I'm actively studying Vuex (actions, mutations, store, getters), Nuxt.js as Server Side Rendering, Vue-Cli, Vue, VueAxios, VueRouters and a lot of plugins for deploying",
          color: "green"
        },
        {
          name: "Gulp.js",
          img: "gulp",
          description:
            "I'm usually using Gulp for individual front-end templates, it's useful, when you want to synergize BrowserSync, SASS-compiler and etc.",
          color: "red"
        },
        {
          name: "CSS3",
          img: "css3 alternate",
          description:
            "Obviously, it's being the most important skill for Front for Front-End development",
          color: "blue"
        },
        {
          name: "SASS/LESS/SCSS",
          img: "sass",
          description:
            "For me the most important is being always to use preprocessors for my code, it will increase code reading and get rid of the standard manipulations, for instance, with prefixes",
          color: "pink"
        },
        {
          name: "HTML5",
          img: "html5",
          description:
            "I'm acquainted with HTML5, I have been starting my Web Development way from it",
          color: "red"
        },
        {
          name: "JavaScript",
          img: "js",
          description:
            "I prefer to programming on native JavaScript for finding any solutions",
          color: "yellow"
        }
      ],
      back: [
        {
          name: "PHP",
          img: "php",
          description:
            "I'm actively engaging in the PHP, also have an experience with Model-View-Controller modulation, PDO Connection, and more oriented on the Objective programming, interacted with standard patterns as 'Singleton', 'Many to Many'",
          color: "blue"
        },
        {
          name: "Laravel",
          img: "laravel",
          description:
            "Laravel is being sufficient wonderful framework for rapid projects building, essentially, working with php artisan is increasing your velocity potential. Like you can just create any migrations, model, view, collection, seed and so on",
          color: "red"
        },
        {
          name: "MySql, PostgreSql",
          img: "database",
          description:
            "I'm acquainted with MySql stadard functions, migrations",
          color: "green"
        },
        {
          name: "Docker",
          img: "docker",
          description:
            "I also prefer to deploy my projects via Docker compilitation, cause it's making total process of installation indeed quickly and high productive, without any struggles",
          color: "blue"
        },
        {
          name: "Node.js",
          img: "node",
          description:
            "I'm actively studying a Node.js, Express, MongoDb as Back End projects building",
          color: "olive"
        }
      ]
    };
  },
  metaInfo: {
    title: "About Me"
  }
};
</script>

<style lang="scss" scoped>
.photo {
  &_feature {
    background: url("https://emilshari.github.io/img/photo_face.png") no-repeat
      center center;
    background-size: cover;
  }
}

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