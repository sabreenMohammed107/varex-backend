<!DOCTYPE html>
<html class="no-js" lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Varex - Cleaning</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('webasset/img/favicon.png') }}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('webasset/css/font-icons.css') }}" />
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('webasset/css/plugins.css') }}" />
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('webasset/css/style.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('webasset/css/style-rtl.css') }}" />

        <style>
            /* General styles */

            body.rtl .slick-prev {
                /* RTL specific styles for previous arrow */
                left: auto;
                right: 0;
            }

            body.rtl .slick-next {
                /* RTL specific styles for next arrow */
                left: 0;
                right: auto;
            }

            /* Similar styles for other elements as needed */

            body.ltr .slick-prev {
                /* LTR specific styles for previous arrow */
                left: 0;
                right: auto;
            }

            body.ltr .slick-next {
                /* LTR specific styles for next arrow */
                left: auto;
                right: 0;
            }
        </style>
    @endif
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('webasset/css/responsive.css') }}" />
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .error-message {
            color: #a94442;
            font-size: 0.875em;
            margin-top: 5px;
        }
    </style>
    @yield('style')
</head>
