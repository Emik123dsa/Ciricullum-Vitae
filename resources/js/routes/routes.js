import HomeComponent from './../components/HomeComponent';
import ErrorComponent from './../components/ErrorComponent';
import PersonalComponent from "./../components/PersonalComponent";
import TestimonialComponent from "./../components/TestimonialComponent";
import SocialsComponent from "./../components/SocialsComponent";
import SkillsComponent from "./../components/SkillsComponent";
import ProjectsComponent from "./../components/ProjectsComponent";
import AboutComponent from "./../components/AboutComponent";
import SkillPreciselyComponent from "./../components/SkillPreciselyComponent";

const routes = [
    {
        name: "Home",
        path: "/",
        component: HomeComponent,
        meta: {
            breadcrumb: 'Home Page'
        }

    },
    {
        name: "About",
        path: "/about",
        component: AboutComponent,
        meta: {
            breadcrumb: 'About me'
        }
    }, {
        name: "Personal",
        path: "/personal",
        component: PersonalComponent,
        meta: {
            breadcrumb: 'Personal Information'
        }
    },
    {
        name: "Testimonial",
        path: "/testimonial",
        component: TestimonialComponent,
        meta: {
            breadcrumb: 'My Testimonial'
        }
    },
    {
        name: "Skills",
        path: "/skills",
        component: SkillsComponent,
        meta: {
            breadcrumb: 'My Skills'
        },
        children: []
    },
    {
        //name: "Current Skill",
        path: "/skills/:id",
        component: SkillPreciselyComponent,
        meta: {
            breadcrumb: "My Skills"
        },
        children: [{
            name: "Current Skill",
            path: "/",
            component: SkillPreciselyComponent,
            meta: {
                breadcrumb: "String"
            },
        }]
    },
    {
        name: "Socials",
        path: "/socials",
        component: SocialsComponent,
        meta: {
            breadcrumb: 'Social Medias'
        }
    },
    {
        name: "Projects",
        path: "/projects",
        component: ProjectsComponent,
        meta: {
            breadcrumb: 'My Projects'
        }
    },
    {
        name: "Error",
        path: "/404",
        component: ErrorComponent,
        meta: {
            breadcrumb: 'Error Page'
        }
    },
    {
        path: "*",
        redirect: "/404"
    }
];

export default routes;