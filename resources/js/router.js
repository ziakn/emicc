import Vue from 'vue'
import Router from 'vue-router'

import user from './components/dashboard/user/Home.vue'
import setting from './components/dashboard/setting/Home.vue'
import enroll from './components/dashboard/enroll/Home.vue'
import useract from './components/dashboard/useract/Home.vue'

import userlist from './components/dashboard/user/userlist.vue'
import usertype from './components/dashboard/user/Type.vue'
import userpassword from './components/dashboard/user/Password.vue'
import profile from './components/dashboard/setting/Profile.vue'
import userenroll from './components/dashboard/enroll/userenroll.vue'
import useractlist from './components/dashboard/useract/ActList.vue'

import i18n from './i18n';


let onlyAdmin = [1]
let mentorOnly = [2]
let customerOnly=[3]
let onlyAdminMentor = [1,2]
let allOnly = [1,2,3]

Vue.use(Router)
export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/user',
            name: 'user',
            component: user,
            meta: {
                icon: 'face',
                title: i18n.t('message.leftbar.user'),
                type: onlyAdminMentor,
                status: true,
            },
            children: [
                {
                    path: 'list',
                    name: 'userlist',
                    component: userlist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.user.list'),
                        type: onlyAdminMentor,
                        status: true,
        
                    }
                },
                {
                    path: 'usertype',
                    name: 'usertype',
                    component: usertype,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.user.usertype'),
                        type: onlyAdmin,
                        status: true,
        
                    }
                },
                {
                    path: 'password',
                    name: 'password',
                    component: userpassword,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.user.password'),
                        type: onlyAdminMentor,
                        status: true,
        
                    }
                },
            ]

        },

        {
            path: '/enroll',
            name: 'enroll',
            component: enroll,
            meta: {
                icon: 'settings',
                title: i18n.t('message.leftbar.enroll'),
                type: mentorOnly,
                status: true,
            },
            children: [
                {
                    path: 'userenroll',
                    name: 'userenroll',
                    component: userenroll,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.enroll.userenroll'),
                        type: mentorOnly,
                        status: true,
                    }
                },
            ]
        },
        {
            path: '/useract',
            name: 'useract',
            component: useract,
            meta: {
                icon: 'settings',
                title: i18n.t('message.leftbar.useract'),
                type: customerOnly,
                status: true,
            },
            children: [
                {
                    path: 'useractlist',
                    name: 'useractlist',
                    component: useractlist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.useract.list'),
                        type: customerOnly,
                        status: true,
        
                    }
                },
            ]

        },
        {
            path: '/setting',
            name: 'setting',
            component: setting,
            meta: {
                icon: 'settings',
                title: i18n.t('message.leftbar.setting'),
                type: allOnly,
                status: true,
            },
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    component: profile,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.setting.profile'),
                        type: allOnly,
                        status: true,
        
                    }
                },
            ]

        }, 


    



    ]
})