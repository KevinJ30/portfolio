import React from 'react';
import {render} from "react-dom";
import ViewProject from "./ViewProject";

export default class ViewProjectCustom extends HTMLElement {
    connectedCallback() {
        const props = Object.values(this.attributes).map(attribute => [attribute.name, attribute.value])
        this.component = <ViewProject {...Object.fromEntries(props)} />;
        render(this.component, this);
    }


    disconnectedCallback() {
        unmountComponentAtNode(this.component);
    }

}