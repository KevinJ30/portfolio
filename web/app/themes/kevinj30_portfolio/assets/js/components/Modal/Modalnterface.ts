import * as React from "react";

export interface ModalBehaviorInterface {
    children: React.ReactChild,
    closeModal: CallableFunction,
    modal_title: string,
    visibility: boolean
}

/**
 * {button_text, modal_title, children}
 **/
export interface ModalInterface {
    button_text: string,
    modal_title: string,
    children: React.ReactChild
}