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

    useEffect(() => {
        //Chargement des données depuis l'api google
        fetch('wp-json/wp/v2/projets/' + props.project_id)
            .then(response => response.json())
            .then(data => {
                setData(data);
                setLoad(true);
            })
        // Get meta
        fetch('wp-json')
            .then(response => response.json())
            .then(data => {
                console.log(data)
            })
    }, []);

    if(!load) {
        return 'Chargement...';
    }
    else {
        return <React.Fragment>
            <h2 dangerouslySetInnerHTML={{__html: data.details_project}} />
            <div className="project_details">

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
            <ViewProjectContent project_id={props.id} />
        </Modal>
    </React.Fragment>;
}