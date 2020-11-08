<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <v-list shaped dense>
        <v-list-group
          v-for="(item,index) in items"
          :key="index"
          v-model="item.model"
          :prepend-icon="item.meta.icon"
         active-class="red lighten-3"
          v-show="isShow(item.meta)"
        >
          <template v-slot:activator >
            <v-list-item >
              <v-list-item-content>
                <v-list-item-title>{{ item.meta.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </template>
          <v-list-item 
          
            v-for="(child, i) in item.children"
            :key="i"
            :to="handleGoToMenu(item.path+'/'+child.path)"
            v-show="isShow(child.meta) && child.meta.status"
          >
            <v-list-item-content>
              <v-list-item-title>
                <v-icon x-small color="rgba(255, 255, 255, 0.3)">fiber_manual_record</v-icon>
                 {{ child.meta.title }}
            </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </v-list>
      <template v-slot:append>
        <div class="pa-2">
          <v-btn color="primary" block href="/logoutuser">Logout</v-btn>
        </div>
      </template>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  props: {
    trigger: true,
    items:Array,
  },
data: function () {
    return {
    drawer: true,

  }},
  watch: {
    trigger() {
      this.drawer = !this.drawer;
    }
  },
  methods: {
    logout()
    {
      

    },
      isShow(item)
      {
          let flag=false;
          for(let i=0;i<item.type.length;i++)
          {
              if(item.type[i]==this.$store.state.authUser.type)
              {
                  return flag=true;
                  
              }
          }
          return flag;

      },
    handleGoToMenu(d) 
    {
      // console.log(d)
      return d;
    },
    showChild(link) {
      if(link)
      return true;
      else
      return false;
    }
  }
};
</script>