<?php

    echo'
    .zocarro-btn {
        position: relative;
        display: inline-block;
        box-sizing: border-box;
        border: none;
        border-radius: 4px;
        padding: 0 16px;
        min-width: 64px;
        height: 36px;
        vertical-align: middle;
        text-align: center;
        text-overflow: ellipsis;
        text-transform: uppercase;
        color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        background-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
        font-size: 14px;
        font-weight: 500;
        line-height: 36px;
        overflow: hidden;
        outline: none;
        cursor: pointer;
        transition: box-shadow 0.2s;
    }

    .zocarro-btn::-moz-focus-inner {
        border: none;
    }

    /* Overlay */
    .zocarro-btn::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        opacity: 0;
        transition: opacity 0.2s;
    }

    /* Ripple */
    .zocarro-btn::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        border-radius: 50%;
        padding: 50%;
        width: 32px; /* Safari */
        height: 32px; /* Safari */
        background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
        opacity: 0;
        transform: translate(-50%, -50%) scale(1);
        transition: opacity 1s, transform 0.5s;
    }

    /* Hover, Focus */
    .zocarro-btn:hover,
    .zocarro-btn:focus {
        box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.2), 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12);
    }

    .zocarro-btn:hover::before {
        opacity: 0.08;
    }

    .zocarro-btn:focus::before {
        opacity: 0.24;
    }

    .zocarro-btn:hover:focus::before {
        opacity: 0.3;
    }

    /* Active */
    .zocarro-btn:active {
        box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.2), 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12);
    }

    .zocarro-btn:active::after {
        opacity: 0.32;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0s;
    }

    /* Disabled */
    .zocarro-btn:disabled {
        color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
        background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.12);
        box-shadow: none;
        cursor: initial;
    }

    .zocarro-btn:disabled::before {
        opacity: 0;
    }

    .zocarro-btn:disabled::after {
        opacity: 0;
    }';

?>