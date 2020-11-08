import Vue from 'vue'
import Router from 'vue-router'

import user from './components/dashboard/user/Home.vue'
import setting from './components/dashboard/setting/Home.vue'
import contactus from './components/dashboard/setting/Home.vue'
import aboutus from './components/dashboard/setting/Home.vue'
import faqs from './components/dashboard/setting/Home.vue'
import enroll from './components/dashboard/enroll/Home.vue'
import useract from './components/dashboard/useract/Home.vue'


import userlist from './components/dashboard/user/userlist.vue'
import usertype from './components/dashboard/user/Type.vue'
import userpassword from './components/dashboard/user/Password.vue'
import profile from './components/dashboard/setting/Profile.vue'
import contactuslist from './components/dashboard/setting/ContactUs.vue'
import aboutuslist from './components/dashboard/setting/AboutUs.vue'
import faqslist from './components/dashboard/setting/Faqs.vue'
import userenroll from './components/dashboard/enroll/userenroll.vue'
import useractlist from './components/dashboard/useract/ActList.vue'
import useractadd from './components/dashboard/useract/AddList.vue'
import mentorlist from './components/dashboard/useract/MentorList.vue'
import useractdetail from './components/dashboard/enroll/UserDetail.vue'

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
                icon: 'alarm_add',
                title: i18n.t('message.leftbar.enroll'),
                type: onlyAdminMentor,
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
                        type: onlyAdminMentor,
                        status: true,
                    }
                },
                {
                    path: 'useractdetail/:id',
                    name: 'useractdetail',
                    component: useractdetail,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.useract.add'),
                        type: onlyAdminMentor,
                        status: false,
        
                    }
                },
                {
                    path: 'useractadd',
                    name: 'useractadd',
                    component: useractadd,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.useract.add'),
                        type: mentorOnly,
                        status: true,
        
                    }
                },
            ]
        },
        {
            path: '/mentor',
            name: 'mentor',
            component: useract,
            meta: {
                icon: 'accessibility',
                title: i18n.t('message.leftbar.mentor'),
                type: customerOnly,
                status: true,
            },
            children: [
                {
                    path: 'mentorlist',
                    name: 'mentorlist',
                    component: mentorlist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.mentor.list'),
                        type: customerOnly,
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
                icon: 'edit',
                title: i18n.t('message.leftbar.useract'),
                type: customerOnly,
                status: true,
            },
            children: [
                {
                    path: 'useractadd',
                    name: 'useractadd',
                    component: useractadd,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.useract.add'),
                        type: customerOnly,
                        status: true,
        
                    }
                },
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
                {
                    path: 'useractadd/:id',
                    name: 'useractadd',
                    component: useractadd,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.useract.add'),
                        type: customerOnly,
                        status: false,
        
                    }
                },
               
            ]

        },
        {
            path: '/contactus',
            name: 'contactus',
            component: contactus,
            meta: {
                icon: 'perm_phone_msg',
                title: i18n.t('message.leftbar.contactus'),
                type: allOnly,
                status: true,
            },
            children: [
                {
                    path: 'contactuslist',
                    name: 'contactuslist',
                    component: contactuslist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.contactus.list'),
                        type: allOnly,
                        status: true,
        
                    }
                },
            ]
        }, 
        {
            path: '/aboutus',
            name: 'aboutus',
            component: aboutus,
            meta: {
                icon: 'info',
                title: i18n.t('message.leftbar.aboutus'),
                type: allOnly,
                status: true,
            },
            children: [
                {
                    path: 'aboutuslist',
                    name: 'aboutuslist',
                    component: aboutuslist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.aboutus.list'),
                        type: allOnly,
                        status: true,
        
                    }
                },
            ]
        }, 
        {
            path: '/faqs',
            name: 'faqs',
            component: faqs,
            meta: {
                icon: 'contact_support',
                title: i18n.t('message.leftbar.faqs'),
                type: allOnly,
                status: true,
            },
            children: [
                {
                    path: 'faqslist',
                    name: 'faqslist',
                    component: faqslist,
                    meta: {
                        icon: 'dashboard',
                        title: i18n.t('message.faqs.list'),
                        type: allOnly,
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