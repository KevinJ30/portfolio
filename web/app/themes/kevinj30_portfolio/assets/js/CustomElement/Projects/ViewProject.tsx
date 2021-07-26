import * as React from 'react';
import {useEffect, useState} from 'react'
import {Modal} from "../../components/Modal/Modal";

// interface ProjectInterface {
//     // url: string,
//     // content: React.ReactNode,
//     open: boolean
// }

// function ViewProjectContent(props: ProjectInterface) {
//
//     if(props.open) {
//         return createPortal(
//                 <h1>Test</h1>
//             , document.body);
//     }
//
//     return null;
// }

interface ProjectInterface {
    title: string
}

function ViewProjectContent(props: any) {
    const [load, setLoad] = useState(false);
    const [data, setData] = useState([]);
    const  [customField, setCustomField] = useState([]);

    useEffect(() => {
        // Get data in your API Wordpress
        fetch('wp-json/wp/v2/projets/' + props.project_id)
            .then(response => response.json())
            .then(data => {
                setData(data);
            })

        // Get Meta in your ACF
        fetch('wp-json/acf/v3/projets/' + props.project_id)
            .then(response => response.json())
            .then(data => {
                setCustomField(data.acf)
                setLoad(true);
            })
    }, []);

    if(!load) {
        return 'Chargement...';
    }
    else {
        {console.log(customField)}
        return <React.Fragment>
            <h2 dangerouslySetInnerHTML={{__html: data.title.rendered}} />
            <div className="project_details project__details">
                { customField.details_project }
            </div>
            <div className="project__content">
                <img src={customField.img} alt="Image de présentation du projet" className={"project__image"}/>
                <div dangerouslySetInnerHTML={{__html: data.content.rendered}} />
            </div>
        </React.Fragment>;
    }
}

export default function ViewProject(props: any) {
    const [open, setOpen] = useState(false);
    console.log(props.data);
    const handleClick:React.MouseEventHandler<HTMLButtonElement> = () => {
        setOpen(true);
    }

    return <React.Fragment>
        <Modal button_text={"En savoir plus"}>
            <ViewProjectContent project_id={props.project_id} />
        </Modal>
    </React.Fragment>;
}