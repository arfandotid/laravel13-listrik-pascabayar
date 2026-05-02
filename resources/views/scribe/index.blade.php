<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Aplikasi Pembayaran Listrik Pascabayar API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.9.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.9.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETadmin-login">
                                <a href="#endpoints-GETadmin-login">Menampilkan halaman login admin.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-login">
                                <a href="#endpoints-POSTadmin-login">Memproses login admin.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-logout">
                                <a href="#endpoints-POSTadmin-logout">Memproses logout admin.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-dashboard">
                                <a href="#endpoints-GETadmin-dashboard">Menampilkan halaman dashboard dengan data tren tahunan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-profile">
                                <a href="#endpoints-GETadmin-profile">Menampilkan halaman profil pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-profile">
                                <a href="#endpoints-PUTadmin-profile">Memperbarui informasi profil pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-profile-password">
                                <a href="#endpoints-GETadmin-profile-password">Menampilkan halaman untuk mengubah password pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-profile-password">
                                <a href="#endpoints-PUTadmin-profile-password">Memperbarui password pengguna setelah validasi.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-settings">
                                <a href="#endpoints-GETadmin-settings">GET admin/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-settings">
                                <a href="#endpoints-PUTadmin-settings">PUT admin/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-settings-delete-logo">
                                <a href="#endpoints-DELETEadmin-settings-delete-logo">Menghapus logo aplikasi dari penyimpanan dan memperbarui data setting untuk mengosongkan field logo,
kemudian kembali ke halaman pengaturan dengan pesan sukses.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-permissions">
                                <a href="#endpoints-GETadmin-permissions">Menampilkan daftar permission.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-permissions-create">
                                <a href="#endpoints-GETadmin-permissions-create">Menampilkan form pembuatan permission.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-permissions">
                                <a href="#endpoints-POSTadmin-permissions">Menyimpan permission baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-permissions--permission_id--edit">
                                <a href="#endpoints-GETadmin-permissions--permission_id--edit">Menampilkan form edit permission.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-permissions--id-">
                                <a href="#endpoints-PUTadmin-permissions--id-">Memperbarui permission.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-permissions--id-">
                                <a href="#endpoints-DELETEadmin-permissions--id-">Menghapus permission.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-roles">
                                <a href="#endpoints-GETadmin-roles">GET admin/roles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-roles-create">
                                <a href="#endpoints-GETadmin-roles-create">GET admin/roles/create</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-roles">
                                <a href="#endpoints-POSTadmin-roles">POST admin/roles</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-roles--role_id--edit">
                                <a href="#endpoints-GETadmin-roles--role_id--edit">GET admin/roles/{role_id}/edit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-roles--id-">
                                <a href="#endpoints-PUTadmin-roles--id-">PUT admin/roles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-roles--id-">
                                <a href="#endpoints-DELETEadmin-roles--id-">DELETE admin/roles/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users">
                                <a href="#endpoints-GETadmin-users">Menampilkan daftar pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users-create">
                                <a href="#endpoints-GETadmin-users-create">Menampilkan form pembuatan pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-users">
                                <a href="#endpoints-POSTadmin-users">Menyimpan data pengguna baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-users--user_id--edit">
                                <a href="#endpoints-GETadmin-users--user_id--edit">Menampilkan form edit pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-users--id-">
                                <a href="#endpoints-PUTadmin-users--id-">Memperbarui data pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-users--id-">
                                <a href="#endpoints-DELETEadmin-users--id-">Menghapus data pengguna.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tarif">
                                <a href="#endpoints-GETadmin-tarif">Menampilkan daftar tarif listrik.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tarif-create">
                                <a href="#endpoints-GETadmin-tarif-create">Menampilkan form pembuatan tarif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-tarif">
                                <a href="#endpoints-POSTadmin-tarif">Menyimpan data tarif baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tarif--tarif_id--edit">
                                <a href="#endpoints-GETadmin-tarif--tarif_id--edit">Menampilkan form edit tarif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-tarif--id-">
                                <a href="#endpoints-PUTadmin-tarif--id-">Memperbarui data tarif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-tarif--id-">
                                <a href="#endpoints-DELETEadmin-tarif--id-">Menghapus data tarif.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pelanggan">
                                <a href="#endpoints-GETadmin-pelanggan">Menampilkan daftar pelanggan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pelanggan-create">
                                <a href="#endpoints-GETadmin-pelanggan-create">Menampilkan form untuk membuat pelanggan baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-pelanggan">
                                <a href="#endpoints-POSTadmin-pelanggan">Menyimpan data pelanggan baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pelanggan--pelanggan_id--edit">
                                <a href="#endpoints-GETadmin-pelanggan--pelanggan_id--edit">Menampilkan form untuk mengedit pelanggan yang sudah ada.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-pelanggan--id-">
                                <a href="#endpoints-PUTadmin-pelanggan--id-">Memperbarui data pelanggan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-pelanggan--id-">
                                <a href="#endpoints-DELETEadmin-pelanggan--id-">Menghapus data pelanggan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-penggunaan">
                                <a href="#endpoints-GETadmin-penggunaan">Menampilkan daftar penggunaan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-penggunaan-create">
                                <a href="#endpoints-GETadmin-penggunaan-create">Menampilkan form pembuatan penggunaan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-penggunaan">
                                <a href="#endpoints-POSTadmin-penggunaan">Menyimpan data penggunaan baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-penggunaan--penggunaan_id--edit">
                                <a href="#endpoints-GETadmin-penggunaan--penggunaan_id--edit">Menampilkan form edit penggunaan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-penggunaan--id-">
                                <a href="#endpoints-PUTadmin-penggunaan--id-">Memperbarui data penggunaan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-penggunaan--id-">
                                <a href="#endpoints-DELETEadmin-penggunaan--id-">Menghapus data penggunaan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tagihan">
                                <a href="#endpoints-GETadmin-tagihan">Menampilkan daftar tagihan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tagihan-create">
                                <a href="#endpoints-GETadmin-tagihan-create">Menampilkan form pembuatan tagihan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-tagihan">
                                <a href="#endpoints-POSTadmin-tagihan">Menyimpan data tagihan baru.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-tagihan--tagihan_id--edit">
                                <a href="#endpoints-GETadmin-tagihan--tagihan_id--edit">Menampilkan form edit tagihan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-tagihan--id-">
                                <a href="#endpoints-PUTadmin-tagihan--id-">Memperbarui data tagihan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-tagihan--id-">
                                <a href="#endpoints-DELETEadmin-tagihan--id-">Menghapus data tagihan.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pembayaran">
                                <a href="#endpoints-GETadmin-pembayaran">Menampilkan daftar pembayaran dengan fitur pencarian dan pagination.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pembayaran-create">
                                <a href="#endpoints-GETadmin-pembayaran-create">GET admin/pembayaran/create</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTadmin-pembayaran">
                                <a href="#endpoints-POSTadmin-pembayaran">POST admin/pembayaran</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-pembayaran--pembayaran_id--edit">
                                <a href="#endpoints-GETadmin-pembayaran--pembayaran_id--edit">GET admin/pembayaran/{pembayaran_id}/edit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTadmin-pembayaran--id-">
                                <a href="#endpoints-PUTadmin-pembayaran--id-">PUT admin/pembayaran/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEadmin-pembayaran--id-">
                                <a href="#endpoints-DELETEadmin-pembayaran--id-">Menghapus pembayaran dari database.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 2, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETadmin-login">Menampilkan halaman login admin.</h2>

<p>
</p>



<span id="example-requests-GETadmin-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IjhjdXhUVmwxRkhlWEh6VWtVWDhNVVE9PSIsInZhbHVlIjoiWE5jWHNqYkQweVVua2FVcmZaOTg5Wi9xSU9zcEhCZ2RBNlRDK01CTDZFS1lhclRmS3pBUnVLU3plSHBKVWpVbDB3RnZ6b2hqemhmR3JKTnBRMHB6VFBkUldDRW1PVHNSRWFuNmtsUVVoYWNHZHhaOHo0dzJIN3FUeWg1K3pSanUiLCJtYWMiOiJhYmM4YjI1ZmY1NTI3MzU4MTZmYzJhMWU4OGRhYjg4OTY2M2QxYzZjOGU0NDU0NjcwOWY5ZmE5YmIxMWY3MmFmIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IkU2WmNuUklweVY4dEdjYlpaRi9CMFE9PSIsInZhbHVlIjoiRVJUNzFOczl6aUdqREpHaVZsNTZ3WVpza3ZZUEEwVEZyelI4RlNCQUZTTUlwVWM5SVkvR2JOTnN4OEFiQUYxcWNQZE1DSVA5WFhLR1pOUllZMElVVURWRHlmd2ZDOGFORjRsTTI5L2czMUFTNytNY25MUEgzcDBVZHhTbFdhTkQiLCJtYWMiOiI4NDIzOGMzZTFkZTBjZDEzMTZmOGFiYzA4MmMzN2VmM2I2MzljOGNjMDhjZDhlMzRiYTgwMGRjYzJlNGQ3NTcwIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html&gt;

&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot; /&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0, maximum-scale=1.0&quot; /&gt;
    &lt;link rel=&quot;stylesheet&quot; href=&quot;https://fonts.googleapis.com/css?family=Geist:400,500,600,700&amp;display=swap&quot;&gt;
    &lt;script type=&quot;module&quot; &gt;
    import RefreshRuntime from &#039;http://127.0.0.1:5173/@react-refresh&#039;
    RefreshRuntime.injectIntoGlobalHook(window)
    window.$RefreshReg$ = () =&gt; {}
    window.$RefreshSig$ = () =&gt; (type) =&gt; type
    window.__vite_plugin_react_preamble_installed__ = true
&lt;/script&gt;    &lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:5173/@vite/client&quot;&gt;&lt;/script&gt;&lt;script type=&quot;module&quot; src=&quot;http://127.0.0.1:5173/resources/js/app.jsx&quot;&gt;&lt;/script&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://127.0.0.1:5173/resources/css/app.css&quot; /&gt;        &lt;style&gt;
        body {
            font-family: &#039;Geist&#039;, sans-serif;
        }
    &lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;

    &lt;div id=&quot;app&quot; data-page=&quot;{&amp;quot;component&amp;quot;:&amp;quot;Admin\/Auth\/Login&amp;quot;,&amp;quot;props&amp;quot;:{&amp;quot;errors&amp;quot;:{},&amp;quot;flash&amp;quot;:{&amp;quot;success&amp;quot;:null,&amp;quot;error&amp;quot;:null},&amp;quot;auth&amp;quot;:{&amp;quot;user&amp;quot;:null,&amp;quot;permissions&amp;quot;:[],&amp;quot;pelanggan&amp;quot;:null},&amp;quot;settings&amp;quot;:{&amp;quot;id&amp;quot;:1,&amp;quot;app_name&amp;quot;:&amp;quot;Aplikasi Pembayaran Listrik Pascabayar&amp;quot;,&amp;quot;app_logo&amp;quot;:null,&amp;quot;created_at&amp;quot;:&amp;quot;2026-05-01T10:13:11.000000Z&amp;quot;,&amp;quot;updated_at&amp;quot;:&amp;quot;2026-05-01T10:13:11.000000Z&amp;quot;}},&amp;quot;url&amp;quot;:&amp;quot;\/admin\/login&amp;quot;,&amp;quot;version&amp;quot;:&amp;quot;95c58b7e9b8a4b96335900e74a418bc8&amp;quot;,&amp;quot;clearHistory&amp;quot;:false,&amp;quot;encryptHistory&amp;quot;:false}&quot;&gt;&lt;/div&gt;
&lt;/body&gt;

&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-login" data-method="GET"
      data-path="admin/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-login"
                    onclick="tryItOut('GETadmin-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-login"
                    onclick="cancelTryOut('GETadmin-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-login">Memproses login admin.</h2>

<p>
</p>

<p>Mendukung login menggunakan:</p>
<ul>
<li>email</li>
<li>username</li>
</ul>

<span id="example-requests-POSTadmin-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"login\": \"architecto\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "login": "architecto",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-login">
</span>
<span id="execution-results-POSTadmin-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-login" data-method="POST"
      data-path="admin/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-login"
                    onclick="tryItOut('POSTadmin-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-login"
                    onclick="cancelTryOut('POSTadmin-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>login</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="login"                data-endpoint="POSTadmin-login"
               value="architecto"
               data-component="body">
    <br>
<p>Email atau username. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTadmin-login"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Password pengguna. Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTadmin-logout">Memproses logout admin.</h2>

<p>
</p>

<p>Menghapus session dan token keamanan.</p>

<span id="example-requests-POSTadmin-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-logout">
</span>
<span id="execution-results-POSTadmin-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-logout" data-method="POST"
      data-path="admin/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-logout"
                    onclick="tryItOut('POSTadmin-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-logout"
                    onclick="cancelTryOut('POSTadmin-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-dashboard">Menampilkan halaman dashboard dengan data tren tahunan.</h2>

<p>
</p>

<p>Method ini mengambil data akumulasi 'jumlah_meter' dari tabel tagihan,
mengelompokkannya berdasarkan tahun dan bulan, serta mengambil daftar tahun
yang tersedia untuk filter pada sisi klien (Inertia).</p>

<span id="example-requests-GETadmin-dashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/dashboard"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-dashboard">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlhQMUcvWWp1cEt6ZGxSb0pSc1hwYVE9PSIsInZhbHVlIjoiNVpyQ1FCeHdyRkRhQkNZalQxVnNHVEVlYlVzdXo0bEV2cDFHcFNYeGVpbktKcnJWM0RpbWMya0xjR2Q4clErMXE0M25KR0R5S05kbnhqOFg0OUNicDFpTlJ3NE9GSDllSnhNWVNCSEtGTnJFME9wRVFnem40Zm5BUVAxRUFUb3EiLCJtYWMiOiI1NzJkMjc0NGM0ZmFkZDk5ZmMzMjRlYjQ4MjdmZmMzZTYzNjExYjZiMDBhYzM3M2YwNTk1YzgyNDRhNDgwOTlkIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjZ1b0R5NDRCSXZqaGJKUTJyK0xNUkE9PSIsInZhbHVlIjoic2F1Q2xRR2FnU1c5d3MxTDVTMTh6ZHFaanQ1VTlhL25tb1pXMnl3K3FPVi84bjNwYzU4VjhzWlVHdjR4Z3hndC9JWFN4NlNsckpIZVNoeEhxblJ3SUhwRlhCdTIzSFFoUTZRWFRCZmxIUDJJWnM1bDZ3SWRzdjFhMHJFTXNXbFAiLCJtYWMiOiIxNjhhNmQyODU2NjA0YTM4ZDc0NGZjMzI4ODNlMjBhMDYxMTY4ZWM5OGNhMmE4NzRjN2FkYjU2MTQzMTg3ZGNjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-dashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-dashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-dashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-dashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-dashboard" data-method="GET"
      data-path="admin/dashboard"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-dashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-dashboard"
                    onclick="tryItOut('GETadmin-dashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-dashboard"
                    onclick="cancelTryOut('GETadmin-dashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-dashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-profile">Menampilkan halaman profil pengguna.</h2>

<p>
</p>



<span id="example-requests-GETadmin-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Inp0b1k2aWxnT3hVMTYrVnpjTjhlS3c9PSIsInZhbHVlIjoiVDRWc3I1bklMcC96elRUUTNJbUNUMjYrOUdqeWduRGZPMUxvbmtzT09oWTZWVEVtUFdNWXk2Y1BGUHY5MXpWbGVoNW1UV1AwbEozZkJlZzcrVkQ5dGFIR0pOQkl3TU44eXJ0Q3pLb0VnWlFEeHpRYTgwMXlVQVpCbkVjVjgxbngiLCJtYWMiOiI1NmIyZjFiNzc5ZmUzYmUxNDk4NDg5NjFkNTlkYTY5MTVhODg3ZGRmYjUyZjAyN2NmNDAyNzVmY2QzNDJhYjhjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InVZVVFPVDd3NGVYZHFzWXUzNzdwYXc9PSIsInZhbHVlIjoiTnpWR0c3dVNiWEJVYXJmN0JCVU1MYTJyemtjbzhyZGdsQ3pKU0FUS1J6bWlTVnh5MWMyQUJFVmFEL0FmTVJGT0Fuc3RmNWNpSHRQT245NUhUWk92K0UwbnJ6Y1YxbXoySFl3VFBmNlA5Y3kxL0dnbm95UVBaak94c0kxbWNIa20iLCJtYWMiOiI1ZGQ0MTg5ODVmZDc2MDc3MmJiOTM1Mzk4MjBjODIxNzUxZWQ1Njc0NWE4YzhlY2Y0OGQwZjVjYjFiZGVjMTU1IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-profile" data-method="GET"
      data-path="admin/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-profile"
                    onclick="tryItOut('GETadmin-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-profile"
                    onclick="cancelTryOut('GETadmin-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTadmin-profile">Memperbarui informasi profil pengguna.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-profile">
</span>
<span id="execution-results-PUTadmin-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-profile" data-method="PUT"
      data-path="admin/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-profile"
                    onclick="tryItOut('PUTadmin-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-profile"
                    onclick="cancelTryOut('PUTadmin-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-profile"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTadmin-profile"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="PUTadmin-profile"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-GETadmin-profile-password">Menampilkan halaman untuk mengubah password pengguna.</h2>

<p>
</p>



<span id="example-requests-GETadmin-profile-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/profile/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/profile/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-profile-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InpCL0Z1YVFWRitCb1UyVys4SG5SZFE9PSIsInZhbHVlIjoiWEpnWkRud1IvNWdSc2dKbU9iYWF2enZDbHViT3pnUmVNTlpCOWEzTVBHeTBQdW5GWVFzSnZ3MzFPSTg3ZmdqbnlZVVlEdzV6RFdzWExZcnpWN3FCaGg4UUZFQy9YUzZFVGt2d0tHclFaWmt6OUlEZ056MFlsY2JyaXduRVkwMjUiLCJtYWMiOiJlMTEyMWMzMGMyZTg1NzcwNjJmMGQ4YzhkMDA3ZTViNWUyMzRjMzdmYjA3MWExMGI1NmUwYWVlYzNkNjgwN2NjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjBLY2dsbmo3SVkzeVpGcUpka3B4WkE9PSIsInZhbHVlIjoidmN0cUhYTFF5RDRHMmJ5YTdwT2UxdG04TFN3U2kvQmN6d24rSWdaZGk2Z2JhMy9Qa1lGdDFjcDViVWMybkdUQUE4OWZyOWRIQ3QyTUZma0YvL1lubEZPL0FhRXMrNnhhNzVBTmdpRElQVHU2T3RMYUo1dzQ5cy9wNWJ5QU14emciLCJtYWMiOiI2M2I1NTFkMGM3ZDQ2OWYxNjMzNWMyYWRkOGFjNTU1OTUyNGU1ZTZkMjk1YjRmM2YwY2ZiMzQ1ZTgwNzJlYWM0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:36 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-profile-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-profile-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-profile-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-profile-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-profile-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-profile-password" data-method="GET"
      data-path="admin/profile/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-profile-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-profile-password"
                    onclick="tryItOut('GETadmin-profile-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-profile-password"
                    onclick="cancelTryOut('GETadmin-profile-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-profile-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/profile/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-profile-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-profile-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTadmin-profile-password">Memperbarui password pengguna setelah validasi.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-profile-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/profile/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"architecto\",
    \"password\": \"]|{+-0pBNvYg\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/profile/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "architecto",
    "password": "]|{+-0pBNvYg"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-profile-password">
</span>
<span id="execution-results-PUTadmin-profile-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-profile-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-profile-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-profile-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-profile-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-profile-password" data-method="PUT"
      data-path="admin/profile/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-profile-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-profile-password"
                    onclick="tryItOut('PUTadmin-profile-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-profile-password"
                    onclick="cancelTryOut('PUTadmin-profile-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-profile-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/profile/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-profile-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-profile-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PUTadmin-profile-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTadmin-profile-password"
               value="]|{+-0pBNvYg"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>]|{+-0pBNvYg</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-settings">GET admin/settings</h2>

<p>
</p>



<span id="example-requests-GETadmin-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-settings">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Imh3amVxdTRsUSswOGtMZ0Zvd1VUWnc9PSIsInZhbHVlIjoiQzMzbHhVK2k2KzhVbnMvMW55TlJsSkdMRFo3VktlWWVlWU1Pa0NDdGpzS0FWQUl0ZjdYYzZpYS9Td3pNdFQrK3dUUkxKNTQzbGtBaXpjdzV4dWpwQUZzVlpldk4vSlVwdlFqTTh0YUxLL1JqSnhweW9QV0Q0TEJKY01TNEY1cUkiLCJtYWMiOiI0ZWRhZWRiMjBkYzcxOTQxYTZlMjI2NmFkNDk0ZDQzNjhhMzEyNGRlYzMwYzU3OWRiZmFhZTc3NDdiZDczZmJlIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6ImVJSHdqbTR0OG9oWUpTQ2s0MEhTMHc9PSIsInZhbHVlIjoib3VTS2ppSDJLSXFzWG9URWpiMDUxVnBiWGtnelJXYVRILzRsR3g5Z2FSODRzM1dkeFQxcVBvK21VR1U5S3k1V0Q1RHVaRktVazVsNmMxZmFuT3FVdUk0M09EZ2VWMVYzMm4wdjdzY2E1MklxZGdkYVhLUWNTeVcreDNYMHZqNVQiLCJtYWMiOiIyNDkwZjljZTJlYTRjNzQ5ZmNlMjU3N2Q4ODcyY2FjZDI1N2Y2Yzk5MjVjNDFiYWEzZjJmMTgyZjhlOTNkYjk4IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-settings" data-method="GET"
      data-path="admin/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-settings"
                    onclick="tryItOut('GETadmin-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-settings"
                    onclick="cancelTryOut('GETadmin-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTadmin-settings">PUT admin/settings</h2>

<p>
</p>



<span id="example-requests-PUTadmin-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"app_name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "app_name": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-settings">
</span>
<span id="execution-results-PUTadmin-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-settings" data-method="PUT"
      data-path="admin/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-settings"
                    onclick="tryItOut('PUTadmin-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-settings"
                    onclick="cancelTryOut('PUTadmin-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_name"                data-endpoint="PUTadmin-settings"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_logo"                data-endpoint="PUTadmin-settings"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-settings-delete-logo">Menghapus logo aplikasi dari penyimpanan dan memperbarui data setting untuk mengosongkan field logo,
kemudian kembali ke halaman pengaturan dengan pesan sukses.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-settings-delete-logo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/settings/delete-logo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/settings/delete-logo"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-settings-delete-logo">
</span>
<span id="execution-results-DELETEadmin-settings-delete-logo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-settings-delete-logo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-settings-delete-logo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-settings-delete-logo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-settings-delete-logo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-settings-delete-logo" data-method="DELETE"
      data-path="admin/settings/delete-logo"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-settings-delete-logo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-settings-delete-logo"
                    onclick="tryItOut('DELETEadmin-settings-delete-logo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-settings-delete-logo"
                    onclick="cancelTryOut('DELETEadmin-settings-delete-logo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-settings-delete-logo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/settings/delete-logo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-settings-delete-logo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-settings-delete-logo"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-permissions">Menampilkan daftar permission.</h2>

<p>
</p>

<p>Mendukung pencarian dan pagination.</p>

<span id="example-requests-GETadmin-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/permissions?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-permissions">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InAwZmJ5NjhIT3ppVEpPN01ySmhGSWc9PSIsInZhbHVlIjoic2d1Z1Fvb3ErblpsL0NxUThTOGo5WEhkblU4S2VwU3hyR3V6V3ZMYU9GdU9qWXRBMS92dTBEWWRyZWJvaExmdVowVDA3OEdqMjVCNzVSVnRta2N3MTBESFhhYUlEcEZkcW94bXFseXFqbzVlNlFRN1M5NjNRaFlOU3JNWEVDakgiLCJtYWMiOiJhOTRmNzU4MWE5NGNmNGU1ZTU1MTMwYzliZjY4NDhjZmQ4ZjAxM2IxZmJhNThiYmQzNWNhMmM0NmU4M2RhMTgxIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjRLVzM3b2pGSTZuZU03WlV3UXlnRWc9PSIsInZhbHVlIjoiRnl5ekkxVSsxNSt0SlNycmxOZUZpcUlwL0laRm5Dc1d6RzdoQ2toSXZBdWJkMG9ndE1VNUhERWpNb3p4elJGYXA0ZjBSaDg4WHpqaVNyZHRqdmlyLys1UFdDWC9zZm9BbTRqa2lHbm55Q3FyV3Q1ZndMQld4aFZlR1pPMlVDZXoiLCJtYWMiOiJmYWVlNmU2YmU5Y2U1NTEwNDVlZmY5YmEzZjNkNDljNDUzMTZkNTMwNjJiZTk3NGJlYjlmNTgyN2VkM2UzN2E5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-permissions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-permissions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-permissions" data-method="GET"
      data-path="admin/permissions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-permissions"
                    onclick="tryItOut('GETadmin-permissions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-permissions"
                    onclick="cancelTryOut('GETadmin-permissions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-permissions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/permissions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-permissions"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Nama permission. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-permissions-create">Menampilkan form pembuatan permission.</h2>

<p>
</p>



<span id="example-requests-GETadmin-permissions-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/permissions/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-permissions-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IitzT1c1T055K1FpWERqdDZpdmVwS1E9PSIsInZhbHVlIjoiSkZnd0NvT1NmcUZBdE5UZUUyRXhQdUJGME16cGhEMk9BN3RpNTkxaVRVRm9JQ3FuMWJibm84dzRzQmVjS2w5K2kzOG1YMWxTdjJuUEFaZkxZZVhBK0Y1RUExUVB1eTljcytpaXY1eWYvWGJGdlhuUExEWDhNTVJ5WGxnWEp1WFkiLCJtYWMiOiIzZWVjZjQxZWM5N2NhMDI5ODA1MjI3OGZmMDNmMDg2ZGVmMTYxYzk4Mjk1YjRkNTM5YTkwMDFkY2E4MjcyNWQyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6Ijl4OGd6YnpwbkdNbGw0anJleDdrTlE9PSIsInZhbHVlIjoidWVGbnZ1RTJFRkh6YWlzUHBIQWNOTkgvK0NhLzJhcVZ4bEZDK2w0TmdTaDVlWERBTUNWM0QxVFRWYllzTGJnNGFLNE9nMktkV0pPdVhrQ3I4OHpsRDZsSytZSEFaUmwvdmM1S2pjZ3F4c0RVSVdPU3pFZnVkSi90NFduSWFjZ2EiLCJtYWMiOiJkODI0MDA3ZWFjM2ViMzQ5ZTE2OWE1YjBkZjI3NTc0NGRkY2U5NDA1MzNjOWU3NzllZDM1ZDRjZTcwZTQzMjdmIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-permissions-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-permissions-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-permissions-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-permissions-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-permissions-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-permissions-create" data-method="GET"
      data-path="admin/permissions/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-permissions-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-permissions-create"
                    onclick="tryItOut('GETadmin-permissions-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-permissions-create"
                    onclick="cancelTryOut('GETadmin-permissions-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-permissions-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/permissions/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-permissions-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-permissions-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-permissions">Menyimpan permission baru.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-permissions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/permissions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-permissions">
</span>
<span id="execution-results-POSTadmin-permissions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-permissions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-permissions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-permissions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-permissions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-permissions" data-method="POST"
      data-path="admin/permissions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-permissions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-permissions"
                    onclick="tryItOut('POSTadmin-permissions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-permissions"
                    onclick="cancelTryOut('POSTadmin-permissions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-permissions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/permissions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-permissions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-permissions"
               value="architecto"
               data-component="body">
    <br>
<p>Nama permission (unik). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-permissions--permission_id--edit">Menampilkan form edit permission.</h2>

<p>
</p>



<span id="example-requests-GETadmin-permissions--permission_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/permissions/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-permissions--permission_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkxqS1ptTGw1ZVlnWkNkYWwvNmU5L2c9PSIsInZhbHVlIjoiQWlWMmhwNTFqaTBtcXVyem5KV04xQVhEa0xzUGVLODZCclVibGswSEJIa2pBWC9KR1NZT1NNR29vbW5CdGxPajlESFlodHBkbGcyQlM2RzR6TnFLdnp2YldmOEQrUTFaZzMzMWwzUFV6d0k1QURVbE03SklLaWt5b2V4a2Fpc3oiLCJtYWMiOiI5OTMxN2VjZmI2NGUzOTAyMGM1N2QxNTNiNWE0YmVmOGRmYWM1NzI0NzEzYmFkNDMwYzE4Y2JkNzJiODZkYzI5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IkdLL1d1eVFXekRGL0QvN3ZrMmRQREE9PSIsInZhbHVlIjoiUUV3ZlR0ZDA5eHUyZjk4YUVBN1ZIS2p6bS9lOXN6NGFyTHFxTTkwbmRISlpLbzJhTEpSTElIcWdxLzJoZXBhckVGTDlTU2tTRHZNbmZaUVZ6ZCtkU0kwd2FubGk3Ukh2bWg2QzlFOGhSc3JoSkFsRE1CaU51Q0dOWk5tMmRkQmoiLCJtYWMiOiI1ODQ3NWM5NjBjOTQyOGQwNTk2NTI2ZWVhODVkOTRkZjEwOWZmMTVkNzRiMTk3ODliODAxNDRkYWYyNDIzMWM0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-permissions--permission_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-permissions--permission_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-permissions--permission_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-permissions--permission_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-permissions--permission_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-permissions--permission_id--edit" data-method="GET"
      data-path="admin/permissions/{permission_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-permissions--permission_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-permissions--permission_id--edit"
                    onclick="tryItOut('GETadmin-permissions--permission_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-permissions--permission_id--edit"
                    onclick="cancelTryOut('GETadmin-permissions--permission_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-permissions--permission_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/permissions/{permission_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-permissions--permission_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-permissions--permission_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>permission_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="permission_id"                data-endpoint="GETadmin-permissions--permission_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-permissions--id-">Memperbarui permission.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-permissions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/permissions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-permissions--id-">
</span>
<span id="execution-results-PUTadmin-permissions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-permissions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-permissions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-permissions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-permissions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-permissions--id-" data-method="PUT"
      data-path="admin/permissions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-permissions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-permissions--id-"
                    onclick="tryItOut('PUTadmin-permissions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-permissions--id-"
                    onclick="cancelTryOut('PUTadmin-permissions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-permissions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/permissions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/permissions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-permissions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-permissions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-permissions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-permissions--id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-permissions--id-">Menghapus permission.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-permissions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/permissions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/permissions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-permissions--id-">
</span>
<span id="execution-results-DELETEadmin-permissions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-permissions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-permissions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-permissions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-permissions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-permissions--id-" data-method="DELETE"
      data-path="admin/permissions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-permissions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-permissions--id-"
                    onclick="tryItOut('DELETEadmin-permissions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-permissions--id-"
                    onclick="cancelTryOut('DELETEadmin-permissions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-permissions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/permissions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-permissions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-permissions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-permissions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the permission. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-roles">GET admin/roles</h2>

<p>
</p>



<span id="example-requests-GETadmin-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/roles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-roles">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InZpL0ZmNlRPTmtITi9aVW4yUHZiSXc9PSIsInZhbHVlIjoibUdJeXlZeUErVXNIR2pERVdoMGNvdEVKYUhadW1Hak5kRjJDZm5FZFBtVUdJaHdIVE9Ed2tveDBxakYvSzA5dnNuY2hKcWRGSmZUVHhpeGVmTnlmWjdiRVptTnNjMzA5YXgxM3hPbFhrRlZKYVNsYUhEbVZNSnNTS1djZHR6MmUiLCJtYWMiOiI3ZTgxNDQ1ODFlNWZlM2VmMTU1NWYwMTdhZTUzM2EwOTI1OGFjYTg3NTRlM2U0YTIzMzEzYjFkODU1YzMyMWY3IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InNRcUR6WTFhRlVseFpIVldDNGMrVGc9PSIsInZhbHVlIjoiVWhxUkdJc2pkbkhLc3hleXg4QjlFNnB0UXpEV1BxTE5sZGY3d1Q0SmJkU2hSUGs1UmZ4WjFjM3JzNDVDSkNETlEyVHE3WGhNV2Z4eDRtUFpzRGN6a3N4MTJpTXhib2w0SERsZzl6RGErclF1a1lIMngzQ0ZiOHBHWTZQOWJKeVIiLCJtYWMiOiJmMzZkZGJjNWJmM2Q4MTkyYTZiYjE3ZmUxNTdjYzQ0MDM2Yjc5NTBmNjVjMjU0NzVjMjljYmRmZjQ0ZDBjYTVjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-roles" data-method="GET"
      data-path="admin/roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-roles"
                    onclick="tryItOut('GETadmin-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-roles"
                    onclick="cancelTryOut('GETadmin-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-roles-create">GET admin/roles/create</h2>

<p>
</p>



<span id="example-requests-GETadmin-roles-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/roles/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-roles-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ii9ucXRsbURZd21vM094QWEybm5QNlE9PSIsInZhbHVlIjoiTzBzc2JNRmdFVXJWSW5rb1hjVGRsWWNiQ3d3WXFZRldFbkl3Ti94d3JEMjROaVh5NC9NUloyNTR6K01JMEEyWDZydEMrdGdELzJYcTgzSDBDenRKWHZ6NXBZUmUzT3poTDFFMmR0WkZ1RVR2RmVlOFhBdVVLWDAwSWczaWxNOGQiLCJtYWMiOiJiYzQ2YWQ1MzFmZWUyYmY4ZTE1NDRlOTU5ZDdhODIwNTZkODhhNTMxMDliZjNhZjRlNTE2ZTQxZTJiNmFhOTViIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InlzMzQzUkZOVGNFZmRMcWVGdU9yNEE9PSIsInZhbHVlIjoiN0VmNmFkcW5xTUtwQkJaR0kvRDJON0R6bTZjMTB0SmtRTXRKRVZKK3dTMGtEUzZRTDk2bjNDRVBhWm9hU04wMmJPWlJsMmpBdS9HbzN6bHlIOFcrVW8xYUJWSnhLVEZ1RVJWK0ZTSEFYVTY0RVlZamd3S2tlaUYxT1dFVDM3N0UiLCJtYWMiOiJhYTRlZDkwOTZjYzAzYmY4OTdiZmI0MTE2Y2ViZTM5ZDAyN2VhMWY2ZmI4NjBhYTQxZDEwMmJkYWNmMGEyOWUyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-roles-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-roles-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-roles-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-roles-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-roles-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-roles-create" data-method="GET"
      data-path="admin/roles/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-roles-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-roles-create"
                    onclick="tryItOut('GETadmin-roles-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-roles-create"
                    onclick="cancelTryOut('GETadmin-roles-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-roles-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/roles/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-roles-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-roles-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-roles">POST admin/roles</h2>

<p>
</p>



<span id="example-requests-POSTadmin-roles">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/roles" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-roles">
</span>
<span id="execution-results-POSTadmin-roles" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-roles"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-roles"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-roles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-roles">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-roles" data-method="POST"
      data-path="admin/roles"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-roles', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-roles"
                    onclick="tryItOut('POSTadmin-roles');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-roles"
                    onclick="cancelTryOut('POSTadmin-roles');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-roles"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/roles</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-roles"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-roles"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permissions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permissions[0]"                data-endpoint="POSTadmin-roles"
               data-component="body">
        <input type="text" style="display: none"
               name="permissions[1]"                data-endpoint="POSTadmin-roles"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the permissions table.</p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-roles--role_id--edit">GET admin/roles/{role_id}/edit</h2>

<p>
</p>



<span id="example-requests-GETadmin-roles--role_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/roles/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-roles--role_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImhQbnBRWmFkaUFhVG5qRHgwd3BFenc9PSIsInZhbHVlIjoiUGhDTCtRTUYxc011azE2cnZ3emJ5WXgrb2orSE5YMDNCZGhrdlIyMDk0ekE1Q3JMc1l0YlJoL3R6d1kwei94OTFOaUVyNTYxQVB4elhnRHpLU1pabDFSTVpNSGQwQ1pkM3kzOWoyTFRENVkxT3NzMnM2QlJoNWR2TWxtSFBCQlYiLCJtYWMiOiJlZGZjM2Y2NzZkZjkwZGY3ZjNkNjcyNjM5ZjE2ZjUxMTE4NGNiZjkzMDY0MmYyZGE4Y2I5ZGE3MGY3MGNkNGNmIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IklhMmF2ZlZXK1VBL2V3NnZwbElOSWc9PSIsInZhbHVlIjoidG5JNzREejNORUpTeUpNc01RZks5N0Q2dnJ1L3J4YmNVSjRCY3B3emNrNUp3QlNtTWh4YVpaOHI3R0tRTTNlTnNWTG8rVXUwNk5CbFlROXk0aldFSnJSQzd0Ymg3QUFUS0xtNk5HV3FHOFlpdDByL3kxTzRFVy81VUYyUzJ0ZkQiLCJtYWMiOiI0Y2I0MGMwZmUzMDc2YWY4OWEzMDQ3ZjJhMzNiZTRkM2EwZWQ4MzQ3MDkzZDZlMjlmOWEwMzkwOGM0ZGM4NmJlIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-roles--role_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-roles--role_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-roles--role_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-roles--role_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-roles--role_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-roles--role_id--edit" data-method="GET"
      data-path="admin/roles/{role_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-roles--role_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-roles--role_id--edit"
                    onclick="tryItOut('GETadmin-roles--role_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-roles--role_id--edit"
                    onclick="cancelTryOut('GETadmin-roles--role_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-roles--role_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/roles/{role_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-roles--role_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-roles--role_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="role_id"                data-endpoint="GETadmin-roles--role_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-roles--id-">PUT admin/roles/{id}</h2>

<p>
</p>



<span id="example-requests-PUTadmin-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/roles/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-roles--id-">
</span>
<span id="execution-results-PUTadmin-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-roles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-roles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-roles--id-" data-method="PUT"
      data-path="admin/roles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-roles--id-"
                    onclick="tryItOut('PUTadmin-roles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-roles--id-"
                    onclick="cancelTryOut('PUTadmin-roles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-roles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/roles/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/roles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-roles--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-roles--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>permissions</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="permissions[0]"                data-endpoint="PUTadmin-roles--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="permissions[1]"                data-endpoint="PUTadmin-roles--id-"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the permissions table.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-roles--id-">DELETE admin/roles/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-roles--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/roles/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/roles/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-roles--id-">
</span>
<span id="execution-results-DELETEadmin-roles--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-roles--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-roles--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-roles--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-roles--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-roles--id-" data-method="DELETE"
      data-path="admin/roles/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-roles--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-roles--id-"
                    onclick="tryItOut('DELETEadmin-roles--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-roles--id-"
                    onclick="cancelTryOut('DELETEadmin-roles--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-roles--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/roles/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-roles--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-roles--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-users">Menampilkan daftar pengguna.</h2>

<p>
</p>

<p>Mendukung pencarian berdasarkan nama dan email serta pagination.</p>

<span id="example-requests-GETadmin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/users?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InpNUUQvMHA4VG13bGVuclJzSEhtMEE9PSIsInZhbHVlIjoiZW5NeWtwTEdTemdrL2svRHRHSE1ubzNJVnBpb05TR3VZU1JmNTk4TTlJZUpaWU9MUG9tS2lVTG94NDlKZm1QNEVNTkc2VkxCR2xDQ1dITDR2TFpIUEJmaXVia200Q0grR3c4V1Z0ajNyY1NHcUVhV2tScXE4ditSOSs1Z0s3UlYiLCJtYWMiOiJjYTgyMWY4ZjVkZWE0MGQwMWJkMTNjYTIzMDlkMTA0YjhiMDZmOTk4YjZlYzBiMTRjNTQ5YmRiNGFiMjY3ZjE4IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IndGQlZpQ2NRRUxNeTYzOXBxKzUzdFE9PSIsInZhbHVlIjoic1NjdWhGclZvK2pOc0FPWG5jK1RpbG5lQjhrc2taV2pQV1NGb3RiblZGaUNaT3g5azY3L2drU0FWUUJTUUZXN0dhOWpITVBLM1lnY01OOWVoY0hORVc4MHV2dW0zNHJubTJDbndQMVJ2YitnYTVya3BYUmlVTzZLTDRuUlFrNEYiLCJtYWMiOiI2YzUyZThhNGUxZTZiYWVlYWI5Y2FjN2Q2YTUwZTdiOTdiYWU4MmQ4MDdjZTU2NGMwNWI3ZDI2NjNkYzVkNGM3IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users" data-method="GET"
      data-path="admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users"
                    onclick="tryItOut('GETadmin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users"
                    onclick="cancelTryOut('GETadmin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-users"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Kata kunci pencarian. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-users-create">Menampilkan form pembuatan pengguna.</h2>

<p>
</p>

<p>Mengirim daftar role yang tersedia.</p>

<span id="example-requests-GETadmin-users-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/users/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-users-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Iit5N0N4dVk5bnVCUzIrN2IzazM4Smc9PSIsInZhbHVlIjoiK2ZISlJBd0RUNkJETnVua3IxR2EyYzRsR2dxRnRJZk9CV2JkaTFodTQzem9SV1dnUjNSMjdjNHlReVd2bkdEN2NPSnRpelA4RmtRa1R2YWRLblRFYlU4RHBvOGRtTktreXgxaldlelNkbGlnZGlGckhqNFlkU2xUU2VnSVUveVIiLCJtYWMiOiJmNzYxNjlkZWM2NmY1NTE5MTMxZjJhYTllZjE0ZjRjYTlmYTMwNTg5YjQzYjdiMjA4NmU2NmU1NDFlNjg2MDgyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjVXdHc5RDRiOWFWaHVHRUZrVjBPRUE9PSIsInZhbHVlIjoiY0JUQ0d3T2lkQWpScFB3My94L1l1UlBIalRNb2ZXZTZwaFlwL28rL0NzbmJVUTFZUTNZYnpVR0U2djdxZWtuREZycnNyaWhqQTRqVEdzMXRWck5IQzI4S3hiMUN2aDR1WDN5bnVEdVIvREQ4S0ppaHNmMzdOSTlrcmlKbFh1ZEsiLCJtYWMiOiIxZjUzN2IwMWI0MTRkMDRkM2U4ZTRhYTgyNWRiMTJjZWZiNWViYjg5MDc0MTc3ZmNmMDk5ZGQwNGU1NDJhMDE0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users-create" data-method="GET"
      data-path="admin/users/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users-create"
                    onclick="tryItOut('GETadmin-users-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users-create"
                    onclick="cancelTryOut('GETadmin-users-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-users-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-users">Menyimpan data pengguna baru.</h2>

<p>
</p>

<p>Termasuk assign role ke pengguna.</p>

<span id="example-requests-POSTadmin-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"username\": \"architecto\",
    \"password\": \"|]|{+-\",
    \"roles\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "username": "architecto",
    "password": "|]|{+-",
    "roles": [
        "architecto"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-users">
</span>
<span id="execution-results-POSTadmin-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-users" data-method="POST"
      data-path="admin/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-users"
                    onclick="tryItOut('POSTadmin-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-users"
                    onclick="cancelTryOut('POSTadmin-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-users"
               value="architecto"
               data-component="body">
    <br>
<p>Nama pengguna. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTadmin-users"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email unik. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTadmin-users"
               value="architecto"
               data-component="body">
    <br>
<p>Username unik. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTadmin-users"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Minimal 8 karakter. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>roles</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
<br>
<p>Array ID role.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>*</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="roles.*"                data-endpoint="POSTadmin-users"
               value="16"
               data-component="body">
    <br>
<p>ID role yang valid. Example: <code>16</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-users--user_id--edit">Menampilkan form edit pengguna.</h2>

<p>
</p>

<p>Mengirim:</p>
<ul>
<li>data user</li>
<li>daftar role</li>
<li>role yang sudah dimiliki user</li>
</ul>

<span id="example-requests-GETadmin-users--user_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/users/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-users--user_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Im1PVXFnRndtbDJ0YkhxdUhwYytUbUE9PSIsInZhbHVlIjoiMHdLaEczL2MvYnFBa2F3citiWHRJc3I5bERiSURKM0RnczNJaFRGZXhscElLQU95NVZxTndBNHhaWkUzekVGZzBDUzZ3SnN0bUJlQTdYdk12UUZVTU5UZkdGa3RFSkVicEpNbVh5eXI2eTdBMFdCaTNESHFQdzczcDNwV1VlKy8iLCJtYWMiOiIxY2FiYTk5NTU3MDYwNTY3M2UyMmE1MWRmMTdiNGM5ZDY5NGZjMWVmZTU1YWM2ZmJjOTRjZmEyY2NhMzEzNWRjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6ImdIaVhpbXpsaURwYm5TUExrMUR6UFE9PSIsInZhbHVlIjoibnVFdUZVMldoMWFhb2pQQTVvQi9mcWE5RjZ3RUJ4QkVNeUFNaHAzYUg1STVCRmhwbVZxanJXUWtuNEQrNUIwQU02OUtoTy93MVIxc2hlTFFuOVpEVGZUdERKVkpMcC9Ec21DSmlYR2VZa2dmMlZsNUZlZFRpdXVDMEFPMmMrWTciLCJtYWMiOiIxNDYxMjMwNzAzNTcyNmM4MDAyMmY3ZmM3ZWQ5Zjg5MmVlOGIxOWM4MTE2NTA3NTZiZDY1OTkzMTMyY2Q3Y2E0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-users--user_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-users--user_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-users--user_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-users--user_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-users--user_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-users--user_id--edit" data-method="GET"
      data-path="admin/users/{user_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-users--user_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-users--user_id--edit"
                    onclick="tryItOut('GETadmin-users--user_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-users--user_id--edit"
                    onclick="cancelTryOut('GETadmin-users--user_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-users--user_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/users/{user_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-users--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-users--user_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETadmin-users--user_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-users--id-">Memperbarui data pengguna.</h2>

<p>
</p>

<p>Jika password diisi, maka password akan diperbarui.
Role pengguna akan disinkronisasi ulang.</p>

<span id="example-requests-PUTadmin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"username\": \"architecto\",
    \"password\": \"|]|{+-\",
    \"roles\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "architecto",
    "email": "gbailey@example.net",
    "username": "architecto",
    "password": "|]|{+-",
    "roles": [
        "architecto"
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-users--id-">
</span>
<span id="execution-results-PUTadmin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-users--id-" data-method="PUT"
      data-path="admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-users--id-"
                    onclick="tryItOut('PUTadmin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-users--id-"
                    onclick="cancelTryOut('PUTadmin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/users/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Nama pengguna. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTadmin-users--id-"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email unik. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="PUTadmin-users--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Username unik. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTadmin-users--id-"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Opsional Minimal 8 karakter. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>roles</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="roles[0]"                data-endpoint="PUTadmin-users--id-"
               data-component="body">
        <input type="text" style="display: none"
               name="roles[1]"                data-endpoint="PUTadmin-users--id-"
               data-component="body">
    <br>
<p>Array ID role.</p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-users--id-">Menghapus data pengguna.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/users/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/users/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-users--id-">
</span>
<span id="execution-results-DELETEadmin-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-users--id-" data-method="DELETE"
      data-path="admin/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-users--id-"
                    onclick="tryItOut('DELETEadmin-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-users--id-"
                    onclick="cancelTryOut('DELETEadmin-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-users--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-tarif">Menampilkan daftar tarif listrik.</h2>

<p>
</p>

<p>Mendukung pencarian berdasarkan daya dan tarif per KWH.</p>

<span id="example-requests-GETadmin-tarif">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tarif?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tarif">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImZZUWV4S3cxYnpwdWtpM0o1eFcybHc9PSIsInZhbHVlIjoiMWIvQmhSZTFVNmJHelBpLzhHWG5TTG5jNi9GUDlXWFVxQmovTnZwYWJvNnFoeFpvaDhEK0dHano2ckJBMVFMdUN5WXdQSzBwN2tiREJsUmZEcjBjNElnSm9yVGYreTUraDNsNktmb1BoSjNlUFdKYW5vYkRoRkIwa2VlZFhQNjEiLCJtYWMiOiIyMDZhN2QzMDQ0ZDlkZTQwNDQ3OGIxZWQyNzRjYmJiYTYyY2RiYTQ5ZGI3OTcwODE5MjQxYzQ3NzgzNWU3MDYyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IkRxV2dndnVvL1JBbjNDVm9nS0ZmK0E9PSIsInZhbHVlIjoidkQ0TFhpbTE3eUNoK1NYbGc2K1pDZngrK1RMek4zVWtZa2xXMGM1T3BQRUl2NC9EcWRIMTcyUURJaXo0czA4Y3pNMTV1cTZMd29iaDV1dk90ajlQYWdMc2tjblRRWU1laERPM20wQ2EzbldqUDk4Zlo3dzROSkZNWGVjblJXcTAiLCJtYWMiOiI2NjUxZDdjYzFjZTc5MDYwN2MxYzQwZDQ1ZWViZmY4Nzk4NjU1ZWI2M2ZhMTIyYTY4ODI4NzRkNzMyMjdmNTA5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tarif" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tarif"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tarif"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tarif" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tarif">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tarif" data-method="GET"
      data-path="admin/tarif"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tarif', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tarif"
                    onclick="tryItOut('GETadmin-tarif');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tarif"
                    onclick="cancelTryOut('GETadmin-tarif');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tarif"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tarif</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tarif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tarif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-tarif"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Kata kunci pencarian. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-tarif-create">Menampilkan form pembuatan tarif.</h2>

<p>
</p>



<span id="example-requests-GETadmin-tarif-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tarif/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tarif-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IktwcG85SGs1RC9WbEFoSnNGNURSTmc9PSIsInZhbHVlIjoidFVJMm41WVhwOVl3Sjk2NlJYOVEwb095RXV5R2paTkNFQ3RDbW9aSC9XYjZaSXNSRHJ1TFNncTdLd3BXVVRsV1A3WEpWY2laNmJIM1hpWGVEZzMzN0J6L1BHK1UzSXRkVlZNVGJqajJpNHpGbVNOUTZibkI1L3NtclAvSmI2a2EiLCJtYWMiOiIwNzk2Mjg5OWE4OWM1MTk2NWFhNzczZmM2ZTZiMjI5Nzc3ZDk0YzU2OGQ1NDlkNTRiMzM2MTVkYzI1NjZlZWE5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6Ikd6RFgvb2RubWU4bGIzbXdiaGI5L1E9PSIsInZhbHVlIjoickM3L2ZRenhCMFJlNkdaR2kreXFPa2tJSVAxNDBueUJNcmxXcmNyT2s4cStJV2RTRk1sTml6SmszMk5ueHY1NFpxTjhvVUFaekNHQVlpVDZFQmt1UGhkL285SmRMTGdueXY2bmZ2b2t0ZGc2Z2toL3o3S3d4emt3aUFlSXVLeGsiLCJtYWMiOiI4NDE0Y2I4YjI4OTQ5MWRlYTBjOGU5MGM1NThlOTVlMmQzNmE2NjIzNjUxMDI1NjIyYzNkODU4NDg2OTIzOWQ0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tarif-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tarif-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tarif-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tarif-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tarif-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tarif-create" data-method="GET"
      data-path="admin/tarif/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tarif-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tarif-create"
                    onclick="tryItOut('GETadmin-tarif-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tarif-create"
                    onclick="cancelTryOut('GETadmin-tarif-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tarif-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tarif/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tarif-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tarif-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-tarif">Menyimpan data tarif baru.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-tarif">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/tarif" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"daya\": 16,
    \"tarifperkwh\": 4326.41688
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "daya": 16,
    "tarifperkwh": 4326.41688
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-tarif">
</span>
<span id="execution-results-POSTadmin-tarif" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-tarif"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-tarif"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-tarif" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-tarif">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-tarif" data-method="POST"
      data-path="admin/tarif"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-tarif', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-tarif"
                    onclick="tryItOut('POSTadmin-tarif');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-tarif"
                    onclick="cancelTryOut('POSTadmin-tarif');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-tarif"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/tarif</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-tarif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-tarif"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>daya</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="daya"                data-endpoint="POSTadmin-tarif"
               value="16"
               data-component="body">
    <br>
<p>Daya listrik (VA). Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tarifperkwh</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="tarifperkwh"                data-endpoint="POSTadmin-tarif"
               value="4326.41688"
               data-component="body">
    <br>
<p>Tarif per KWH. Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-tarif--tarif_id--edit">Menampilkan form edit tarif.</h2>

<p>
</p>



<span id="example-requests-GETadmin-tarif--tarif_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tarif/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tarif--tarif_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImZ5dUxMMXNzTHJ6azI3QVQ5d09BekE9PSIsInZhbHVlIjoiRVhRK3MxSHRtMGNITWVpNksyWi9IQ2tUMVIxV21hVkpFaTBHbXJsaVZQMVNrUHhBMlpVK3R4aGpkWFJ5VWUyRDQ5MkIrMytUUVlqaUJ0N1c2Snh4b1R3cnkwUDdCUlZpVFpyN2p5V210Y0ZOdjNNanFPVWFMTFRRSjdkU1JLZDUiLCJtYWMiOiIyNDU1MTJjNDA0MWE4M2Q5MjVhN2JmZDYxYjYwNTRhODE3YWM5MmM3Mzk0MDY3MzQ0MzRkODMxMDk5MjU5YTQwIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IkY2VDBMQ2ZXaVpoSHdpSU01ZS9vL3c9PSIsInZhbHVlIjoiUFMrdFdOMCtpdGlKSEI3Sm9LdnZFTHFWQ2hZNGFzSlBzUm5ublFmR2ROR3I5MXlFajdwYzVETmU4MzdZd3dzYnNSc2N5aW9zb1dzR2hkejYydi9ab1E2c3o2WStmWjhaakNBMnNaTVY2aDN4OU54QUFENDZYZzhBMWZOOGx6SkEiLCJtYWMiOiJhNGJiOTkwMmMzNWE0YzA5MDEzNTc2MTY3NTkyNDFjODA5OGVkOGM1MWRlNTJhMjkwYTJmNWNiYmQxYzg4NGQ5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tarif--tarif_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tarif--tarif_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tarif--tarif_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tarif--tarif_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tarif--tarif_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tarif--tarif_id--edit" data-method="GET"
      data-path="admin/tarif/{tarif_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tarif--tarif_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tarif--tarif_id--edit"
                    onclick="tryItOut('GETadmin-tarif--tarif_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tarif--tarif_id--edit"
                    onclick="cancelTryOut('GETadmin-tarif--tarif_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tarif--tarif_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tarif/{tarif_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tarif--tarif_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tarif--tarif_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tarif_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="tarif_id"                data-endpoint="GETadmin-tarif--tarif_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tarif. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-tarif--id-">Memperbarui data tarif.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-tarif--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/tarif/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"daya\": 16,
    \"tarifperkwh\": 4326.41688
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "daya": 16,
    "tarifperkwh": 4326.41688
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-tarif--id-">
</span>
<span id="execution-results-PUTadmin-tarif--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-tarif--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-tarif--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-tarif--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-tarif--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-tarif--id-" data-method="PUT"
      data-path="admin/tarif/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-tarif--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-tarif--id-"
                    onclick="tryItOut('PUTadmin-tarif--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-tarif--id-"
                    onclick="cancelTryOut('PUTadmin-tarif--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-tarif--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/tarif/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/tarif/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-tarif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-tarif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-tarif--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tarif. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>daya</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="daya"                data-endpoint="PUTadmin-tarif--id-"
               value="16"
               data-component="body">
    <br>
<p>Daya listrik (VA). Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tarifperkwh</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="tarifperkwh"                data-endpoint="PUTadmin-tarif--id-"
               value="4326.41688"
               data-component="body">
    <br>
<p>Tarif per KWH. Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-tarif--id-">Menghapus data tarif.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-tarif--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/tarif/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tarif/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-tarif--id-">
</span>
<span id="execution-results-DELETEadmin-tarif--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-tarif--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-tarif--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-tarif--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-tarif--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-tarif--id-" data-method="DELETE"
      data-path="admin/tarif/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-tarif--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-tarif--id-"
                    onclick="tryItOut('DELETEadmin-tarif--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-tarif--id-"
                    onclick="cancelTryOut('DELETEadmin-tarif--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-tarif--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/tarif/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-tarif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-tarif--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-tarif--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tarif. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-pelanggan">Menampilkan daftar pelanggan.</h2>

<p>
</p>

<p>Menyediakan data pelanggan dengan fitur:</p>
<ul>
<li>Pencarian berdasarkan nama, email, atau nomor KWH</li>
<li>Pagination</li>
</ul>

<span id="example-requests-GETadmin-pelanggan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pelanggan?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pelanggan">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlMveXc5V2N4SmtKTVlkRjdvNmZFZlE9PSIsInZhbHVlIjoiMXRTL29sMlppU055bGdxYVp0MVg2eXVnZU81L2pMQ1d3aEh0dzRnNktKcGQ5SnN5S09ma053dEpEYjBGWHNhd1NmWHRIdmszaVZEdm9iMmNoQit1TW8ySEExZlNMb2tzVkRrR2lEWUJaU0I3LzdDeWQ2YjRRZDAzR0t3TGtPdVoiLCJtYWMiOiI2YzExZDJhN2NlMDhlNDc5ZDEzMzYxOTY1MTRhNmU2NGE2YzdlMDYzOWU2OTRmNDg2OTYwZTc1NmQ4ZmU5NWU5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IlBwbTRUYS9CRUtjRlpTZjVYZk1qaXc9PSIsInZhbHVlIjoiQitLSWJ2QUVyZ1BYdHp1VmcrcUJMb2hvS0RLZ2hlUVZhUFZkUG5sNGxrZFNINUlEdTdJWEdLVFRFeDZxQlh6MDB1TDcxdms5VHp2MlFodjI3Y1Y2c0RRemUxOGphWFArYkl2MFgzbnBSeWFYRGR2OUZodFRqZkVBRmpvb0Q1QU4iLCJtYWMiOiI0Y2M3YzFjYzJkMjVjOTE4Y2FhYTNjNDJiY2NmNjVhYmRlNzI1NGM2YzhlN2Y2ZGE2NjVmZWU5ZDY4Njg0ZmM2IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pelanggan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pelanggan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pelanggan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pelanggan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pelanggan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pelanggan" data-method="GET"
      data-path="admin/pelanggan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pelanggan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pelanggan"
                    onclick="tryItOut('GETadmin-pelanggan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pelanggan"
                    onclick="cancelTryOut('GETadmin-pelanggan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pelanggan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pelanggan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pelanggan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pelanggan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-pelanggan"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Kata kunci pencarian. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-pelanggan-create">Menampilkan form untuk membuat pelanggan baru.</h2>

<p>
</p>



<span id="example-requests-GETadmin-pelanggan-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pelanggan/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pelanggan-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImVQZkhSV3BrRzNzeTRDTEFmajN5U3c9PSIsInZhbHVlIjoiSjRiZFNJTjhnRFp4OXhneERFZitqRXFIR1ZpeEFIT2x3UUxaRTJqdStWTjY3bEROV2x0Ym1oaTdXa242Q2dVMHh4ZjlodUc5NHJMVUl3RU9JZmFxZEFpSUc0enRrUWRZZDRMaXlGUDVrem9FeWdaOGxTYSt1dURBUHdackFLNi8iLCJtYWMiOiI4NjAxZDk2MmM3ODYxNTNhOTRlNjQwZWM5NjE1NmY1YWFhYWNjMDU5ZTgyNGNkZmRiYTJiOTZmMGIwZDE3YzZmIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InloU2VUdVRiOEdVVHhkVHVnZHdjWUE9PSIsInZhbHVlIjoiaDNCOEttdFdZM01wSXlCckhYTWpXUlNrN2hadXMxQUU1S0Y0djUydXp0NndFdlVEOVhiRjV4M3MrbndBNkkzY05MQk5uOHZJRmZxeEo5am9qY1dGbVRBNVdLNkxLM1VLZGo2WU52cnFhWUJlVXhsVFZYLys1dXNJNlhtamRBRE8iLCJtYWMiOiJiMDc4M2VjMDY1MTg2MTYyMjM5NGQzNWRiYjQ1ZDlkMTVlZDdlNDk4ZjAxNzcyMTYwYWE2ZTZiZDg2M2QxYzQ4IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pelanggan-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pelanggan-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pelanggan-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pelanggan-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pelanggan-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pelanggan-create" data-method="GET"
      data-path="admin/pelanggan/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pelanggan-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pelanggan-create"
                    onclick="tryItOut('GETadmin-pelanggan-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pelanggan-create"
                    onclick="cancelTryOut('GETadmin-pelanggan-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pelanggan-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pelanggan/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pelanggan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pelanggan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-pelanggan">Menyimpan data pelanggan baru.</h2>

<p>
</p>



<span id="example-requests-POSTadmin-pelanggan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/pelanggan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama\": \"architecto\",
    \"email\": \"gbailey@example.net\",
    \"username\": \"architecto\",
    \"password\": \"|]|{+-\",
    \"no_kwh\": \"architecto\",
    \"alamat\": \"architecto\",
    \"tarif_id\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama": "architecto",
    "email": "gbailey@example.net",
    "username": "architecto",
    "password": "|]|{+-",
    "no_kwh": "architecto",
    "alamat": "architecto",
    "tarif_id": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-pelanggan">
</span>
<span id="execution-results-POSTadmin-pelanggan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-pelanggan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-pelanggan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-pelanggan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-pelanggan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-pelanggan" data-method="POST"
      data-path="admin/pelanggan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-pelanggan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-pelanggan"
                    onclick="tryItOut('POSTadmin-pelanggan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-pelanggan"
                    onclick="cancelTryOut('POSTadmin-pelanggan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-pelanggan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/pelanggan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-pelanggan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-pelanggan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama"                data-endpoint="POSTadmin-pelanggan"
               value="architecto"
               data-component="body">
    <br>
<p>Nama pelanggan. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTadmin-pelanggan"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Email pelanggan. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="POSTadmin-pelanggan"
               value="architecto"
               data-component="body">
    <br>
<p>Username akun. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTadmin-pelanggan"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Minimal 8 karakter. Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>no_kwh</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="no_kwh"                data-endpoint="POSTadmin-pelanggan"
               value="architecto"
               data-component="body">
    <br>
<p>Nomor KWH. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alamat</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alamat"                data-endpoint="POSTadmin-pelanggan"
               value="architecto"
               data-component="body">
    <br>
<p>Alamat pelanggan. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tarif_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="tarif_id"                data-endpoint="POSTadmin-pelanggan"
               value="16"
               data-component="body">
    <br>
<p>ID tarif. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-pelanggan--pelanggan_id--edit">Menampilkan form untuk mengedit pelanggan yang sudah ada.</h2>

<p>
</p>



<span id="example-requests-GETadmin-pelanggan--pelanggan_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pelanggan/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pelanggan--pelanggan_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IllLYW1QYWUzbXZIN2ZNdDArSzNvL0E9PSIsInZhbHVlIjoicHZzbHdnd2VUVlFLWm9xQWFqczIwbzdkVTdBZ1FtZnB5b2E4RVEvVGF5R2E2cXhZUXVQWWtYWUZ5VlMyN3dMWE9XTG5DRUZzN0VTM1FJN3Z5TEFRelNGUUNmRklCd3hRRTlqeUJJaEhueG1uYmR0c0VCZWFEeHo2cmNtazJlcXgiLCJtYWMiOiJhNzRkYmUzNjMyZjJhZjVjYzI2YWM0MWQ2ZWFmYjc5OWRhNzJhMzI3ODdjNmFhNGZlNWYxZTVlMWFjZWRmZmQ1IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6Im45K2NDUStNNWRYUGpJVk12SEZCY2c9PSIsInZhbHVlIjoiZzlPNkk5SXlrWDNCZTlXc0p2TU9KaWhlMnFsUzExYlFnSFMrVUc3YUs4L2E0QWJiR1liVnN5cktiNG9XK3JqSmwxQU8rbFlOa3B1aXU5Mk1kZUhhTmNIM2ZHN2MxSXVFbnpQbjhEY3VQMzgyL3B2RWpKa2s1OUN5ZEg3WnVZeG8iLCJtYWMiOiJjNTU0ZTAyZDQ2MjU1MjNkMWM1YzkyZjAxMjY4YWYxM2RiYmI3MzJlOWMyMDhhYTQ3YTI0MzM2ZWYxM2RkNTAwIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pelanggan--pelanggan_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pelanggan--pelanggan_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pelanggan--pelanggan_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pelanggan--pelanggan_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pelanggan--pelanggan_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pelanggan--pelanggan_id--edit" data-method="GET"
      data-path="admin/pelanggan/{pelanggan_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pelanggan--pelanggan_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pelanggan--pelanggan_id--edit"
                    onclick="tryItOut('GETadmin-pelanggan--pelanggan_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pelanggan--pelanggan_id--edit"
                    onclick="cancelTryOut('GETadmin-pelanggan--pelanggan_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pelanggan--pelanggan_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pelanggan/{pelanggan_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pelanggan--pelanggan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pelanggan--pelanggan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pelanggan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="pelanggan_id"                data-endpoint="GETadmin-pelanggan--pelanggan_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pelanggan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-pelanggan--id-">Memperbarui data pelanggan.</h2>

<p>
</p>

<p>Jika password tidak diisi, maka password lama tetap digunakan.</p>

<span id="example-requests-PUTadmin-pelanggan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/pelanggan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"nama\": \"architecto\",
    \"email\": \"architecto\",
    \"username\": \"architecto\",
    \"password\": \"]|{+-0pBNvYg\",
    \"no_kwh\": \"architecto\",
    \"alamat\": \"architecto\",
    \"tarif_id\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nama": "architecto",
    "email": "architecto",
    "username": "architecto",
    "password": "]|{+-0pBNvYg",
    "no_kwh": "architecto",
    "alamat": "architecto",
    "tarif_id": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-pelanggan--id-">
</span>
<span id="execution-results-PUTadmin-pelanggan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-pelanggan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-pelanggan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-pelanggan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-pelanggan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-pelanggan--id-" data-method="PUT"
      data-path="admin/pelanggan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-pelanggan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-pelanggan--id-"
                    onclick="tryItOut('PUTadmin-pelanggan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-pelanggan--id-"
                    onclick="cancelTryOut('PUTadmin-pelanggan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-pelanggan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/pelanggan/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/pelanggan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-pelanggan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-pelanggan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-pelanggan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pelanggan. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="nama"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="username"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTadmin-pelanggan--id-"
               value="]|{+-0pBNvYg"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>]|{+-0pBNvYg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>no_kwh</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="no_kwh"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alamat</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alamat"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tarif_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tarif_id"                data-endpoint="PUTadmin-pelanggan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-pelanggan--id-">Menghapus data pelanggan.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-pelanggan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/pelanggan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pelanggan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-pelanggan--id-">
</span>
<span id="execution-results-DELETEadmin-pelanggan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-pelanggan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-pelanggan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-pelanggan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-pelanggan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-pelanggan--id-" data-method="DELETE"
      data-path="admin/pelanggan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-pelanggan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-pelanggan--id-"
                    onclick="tryItOut('DELETEadmin-pelanggan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-pelanggan--id-"
                    onclick="cancelTryOut('DELETEadmin-pelanggan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-pelanggan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/pelanggan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-pelanggan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-pelanggan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-pelanggan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pelanggan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-penggunaan">Menampilkan daftar penggunaan.</h2>

<p>
</p>

<p>Mendukung pencarian berdasarkan bulan dan tahun serta pagination.</p>

<span id="example-requests-GETadmin-penggunaan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/penggunaan?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-penggunaan">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImJTdjYyL2l1aEYybzNFaVF1Vit2S1E9PSIsInZhbHVlIjoiMmt3S1lyY1ZnUi84ci9rcVVNZGRFWSs1SXZqcXZqMGppT1pmTXBvUkJUc3h2M2pqS2R5UC9abVVuaGRmdENvQy9aZDZvY2tzVmlRTEQwSkNNSHFYVHRrTWdXR3BmQWJRTXVwUmtHb0JndXI3QlNnM01mN3RFQjJkbS9Xb0lMdmEiLCJtYWMiOiJhZDg5N2IxNTA3YzZmNTM2YWQ5OGM0YjkxOWQzZDQ5NGU4YTIwYjQ5MzQwOTc1ODU0NDU4Zjg4ZTE2MGFhNzNkIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InVaZlRESFlhR0NYZzZ3YjdCYS95SWc9PSIsInZhbHVlIjoiSHg2b3ZmN3FWdUxSamZOTWJhVFl6TlVtbExrcExRWFN0R2crK0lFTkxEQWZDdUNuQ2pSaTByOHNPdWQ4ZEs0dzhqa2cvbEJ5aXR5bUpPdmExcExGd0hhdWpoenpQeVM4UTBDWFlNM0Z0a3JLcXJZbi9FRFBPMjkzcFpPbFA4TS8iLCJtYWMiOiIwZTRiODY0YjY4NWE0N2YyODY0YjgyZmNlNzljYzM1YTE4MjQxODY0ZmE1ZGE0NTczMTViMjA2NzYwZTY4ZWUwIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-penggunaan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-penggunaan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-penggunaan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-penggunaan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-penggunaan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-penggunaan" data-method="GET"
      data-path="admin/penggunaan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-penggunaan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-penggunaan"
                    onclick="tryItOut('GETadmin-penggunaan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-penggunaan"
                    onclick="cancelTryOut('GETadmin-penggunaan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-penggunaan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/penggunaan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-penggunaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-penggunaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-penggunaan"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Kata kunci pencarian. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-penggunaan-create">Menampilkan form pembuatan penggunaan.</h2>

<p>
</p>

<p>Mengirim daftar pelanggan untuk dipilih.</p>

<span id="example-requests-GETadmin-penggunaan-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/penggunaan/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-penggunaan-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkdjUkQ1STRzQS9XU0lITWlLMHh4K0E9PSIsInZhbHVlIjoiU2xSdFErMDhqbTRwUkhueWxITWMxZXQxQ1JEbHBySjRtRjkxOUUwQnNDRW44OC9lMXV2aXBqMHRyMUdFeFE0OHZaNFFNRjJLSHhDTm1wQkFhOUZCeHY1RVc2SGU2S2JrMjMveXc0aEE4OTBCRnhTOUhoWDc4YVpiZUozTy9rZGQiLCJtYWMiOiJlNGU4OWI2NmJiZTA0NTRlMWFiOTkzMzBkYmY0ZWI4YjU5MGU1YzBjZTZhN2Q1ZTAxZGJmZGEyODM0MGZiZWY3IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjFFeTNmZkVZdVd2Zkwyekd3c2h0TFE9PSIsInZhbHVlIjoibkRHb2pnaDVQYkJIVHVDME1Yb0VyWkNrWDhuN3BUMzliaXNMQXBDZW95S3ZGNk56NE0zNWZpQUtEdnZSYUhJQkpmS0Jwdk5EQTQxZVhNSnEvVldqWlJlemRRdmYrRFNsanlkQUNXRWhMcXA0SDRwUjhxSVpGK2ZRNmxKOGdud0QiLCJtYWMiOiJmMDgwYTAyZGVhMDdjNzEyNGQ4ZTQ3NjBlZTNiNDVkYTkxM2E4ZjQ0MWRlZTA5MmZjZDgzZjNiNjMzMGFmYzYyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:37 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-penggunaan-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-penggunaan-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-penggunaan-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-penggunaan-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-penggunaan-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-penggunaan-create" data-method="GET"
      data-path="admin/penggunaan/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-penggunaan-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-penggunaan-create"
                    onclick="tryItOut('GETadmin-penggunaan-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-penggunaan-create"
                    onclick="cancelTryOut('GETadmin-penggunaan-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-penggunaan-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/penggunaan/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-penggunaan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-penggunaan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-penggunaan">Menyimpan data penggunaan baru.</h2>

<p>
</p>

<p>Sekaligus membuat tagihan secara otomatis dalam satu transaksi database.</p>

<span id="example-requests-POSTadmin-penggunaan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/penggunaan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"pelanggan_id\": 16,
    \"bulan\": \"architecto\",
    \"tahun\": \"architecto\",
    \"meter_awal\": 16,
    \"meter_akhir\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pelanggan_id": 16,
    "bulan": "architecto",
    "tahun": "architecto",
    "meter_awal": 16,
    "meter_akhir": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-penggunaan">
</span>
<span id="execution-results-POSTadmin-penggunaan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-penggunaan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-penggunaan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-penggunaan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-penggunaan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-penggunaan" data-method="POST"
      data-path="admin/penggunaan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-penggunaan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-penggunaan"
                    onclick="tryItOut('POSTadmin-penggunaan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-penggunaan"
                    onclick="cancelTryOut('POSTadmin-penggunaan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-penggunaan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/penggunaan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-penggunaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-penggunaan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pelanggan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="pelanggan_id"                data-endpoint="POSTadmin-penggunaan"
               value="16"
               data-component="body">
    <br>
<p>ID pelanggan. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bulan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bulan"                data-endpoint="POSTadmin-penggunaan"
               value="architecto"
               data-component="body">
    <br>
<p>Bulan penggunaan. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tahun</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun"                data-endpoint="POSTadmin-penggunaan"
               value="architecto"
               data-component="body">
    <br>
<p>Tahun penggunaan. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meter_awal</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="meter_awal"                data-endpoint="POSTadmin-penggunaan"
               value="16"
               data-component="body">
    <br>
<p>Meter awal. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meter_akhir</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="meter_akhir"                data-endpoint="POSTadmin-penggunaan"
               value="16"
               data-component="body">
    <br>
<p>Meter akhir. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-penggunaan--penggunaan_id--edit">Menampilkan form edit penggunaan.</h2>

<p>
</p>



<span id="example-requests-GETadmin-penggunaan--penggunaan_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/penggunaan/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-penggunaan--penggunaan_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjQ0L0ovbUdqYnZoYkZGQnlZMXlsU2c9PSIsInZhbHVlIjoiSGorSUxVUG1hbVRyN1dRMUs2dVlDTTM1S1FTcDlJZU0wL1NrMy9mTE5YaERTNHhLQmU4ckxxakdycDU0NjdGL2ZCSkVuaC8vYnFVTXMweDdWa3Fud2NBU2NFd2E1MTgwenF3ZjNCNHJrMkZaTGlUZTZVVTU5VHI1Mm9MNG1qWXMiLCJtYWMiOiJmMzk4ZWYzNTI1NmFkZGRlZGY1OWE3ODZmZTVmNGVhNzBjMzFlYzk3Y2RlYmFmMWEyYWVkNTE3NDg2YWU2N2U1IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjJ6ZFE5Y3R1M1FPUG9Dak9pai9ybmc9PSIsInZhbHVlIjoidTBSWDRzSG5hZkFlcVhLbU55ZWpiVGNDZ09UdG9iWkpEUnZENzJZU0RsbzN6bzh1RjREQUdSSUFleFlJRVI0TXZkWFAzRnl2b0x6Q2pJbWpJRXV4U0VYbWFQbFY5Q3dVcjgwbjdGL3I3Rm5GL250WFgwNDJQcWtFbGN3Z0xMcjkiLCJtYWMiOiJiNjZiZTMyNjMwNTI5NTQxN2NhYjBhMjUzOGE0YzkwN2U2NzAwNWRlMzQ3YjQwZTgxMWNhZDBkZGQ2MzZhNTE5IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-penggunaan--penggunaan_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-penggunaan--penggunaan_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-penggunaan--penggunaan_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-penggunaan--penggunaan_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-penggunaan--penggunaan_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-penggunaan--penggunaan_id--edit" data-method="GET"
      data-path="admin/penggunaan/{penggunaan_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-penggunaan--penggunaan_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-penggunaan--penggunaan_id--edit"
                    onclick="tryItOut('GETadmin-penggunaan--penggunaan_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-penggunaan--penggunaan_id--edit"
                    onclick="cancelTryOut('GETadmin-penggunaan--penggunaan_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-penggunaan--penggunaan_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/penggunaan/{penggunaan_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-penggunaan--penggunaan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-penggunaan--penggunaan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>penggunaan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="penggunaan_id"                data-endpoint="GETadmin-penggunaan--penggunaan_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the penggunaan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-penggunaan--id-">Memperbarui data penggunaan.</h2>

<p>
</p>



<span id="example-requests-PUTadmin-penggunaan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/penggunaan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"pelanggan_id\": \"architecto\",
    \"bulan\": \"architecto\",
    \"tahun\": \"architecto\",
    \"meter_awal\": \"architecto\",
    \"meter_akhir\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "pelanggan_id": "architecto",
    "bulan": "architecto",
    "tahun": "architecto",
    "meter_awal": "architecto",
    "meter_akhir": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-penggunaan--id-">
</span>
<span id="execution-results-PUTadmin-penggunaan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-penggunaan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-penggunaan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-penggunaan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-penggunaan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-penggunaan--id-" data-method="PUT"
      data-path="admin/penggunaan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-penggunaan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-penggunaan--id-"
                    onclick="tryItOut('PUTadmin-penggunaan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-penggunaan--id-"
                    onclick="cancelTryOut('PUTadmin-penggunaan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-penggunaan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/penggunaan/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/penggunaan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-penggunaan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-penggunaan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-penggunaan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the penggunaan. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pelanggan_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="pelanggan_id"                data-endpoint="PUTadmin-penggunaan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bulan</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="bulan"                data-endpoint="PUTadmin-penggunaan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>tahun</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="tahun"                data-endpoint="PUTadmin-penggunaan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meter_awal</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meter_awal"                data-endpoint="PUTadmin-penggunaan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>meter_akhir</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="meter_akhir"                data-endpoint="PUTadmin-penggunaan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-penggunaan--id-">Menghapus data penggunaan.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-penggunaan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/penggunaan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/penggunaan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-penggunaan--id-">
</span>
<span id="execution-results-DELETEadmin-penggunaan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-penggunaan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-penggunaan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-penggunaan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-penggunaan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-penggunaan--id-" data-method="DELETE"
      data-path="admin/penggunaan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-penggunaan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-penggunaan--id-"
                    onclick="tryItOut('DELETEadmin-penggunaan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-penggunaan--id-"
                    onclick="cancelTryOut('DELETEadmin-penggunaan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-penggunaan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/penggunaan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-penggunaan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-penggunaan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-penggunaan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the penggunaan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-tagihan">Menampilkan daftar tagihan.</h2>

<p>
</p>

<p>Mendukung pencarian berdasarkan bulan, tahun, dan status.</p>

<span id="example-requests-GETadmin-tagihan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tagihan?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tagihan">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkxqM3ZxYkhFQzRlczA2LzdreWRKNkE9PSIsInZhbHVlIjoiSTlYSDZuZlNKS1RFWUV1S2xNVUNjSXo3aVM0cmszdUo0Qk1XL3Y4M3NieFZsSjdyOFZmSm02OUxCK0IxdXdxd2x0VFZEU3NGOWJ1eGpya04vT2NkeUUrOStVc2ZLN3NqYUZMY3lEOWMzMDRzWHBsM3UrbjhwL2lTb0NtQ21FLy8iLCJtYWMiOiIzNGU1MTAzODcxYmJjYmExMDEzYzE3NmY2MmUyZTkyNmQ4MWQzNmVjNzM3ZGE2N2EyYjEzZDFiNDE3ZGJkYjBhIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InVSSThidmJSWDFCTUszUTEyRnZHVkE9PSIsInZhbHVlIjoiT0k3WTVtTjVlQ1l1NmRkdU9vUXd0WE1xaHRPNTNjd0o4MUN1ZmlxNS9kKzZCTnNabUpNV0VCWStUSVFUdFdkbDU2cnZHaUo0QjhTZVU1K3hoRTd5ZzdYR3lRYXV5dDRyWWtIcTdhNVVWS1BqOTlzQUtKaUwyV3p5Z3JnT3V6SlUiLCJtYWMiOiI1ODMxYjgxMzBmNGNlODM5NWU5MTFjYWFjNDI3MmE3MjVkY2NkYTk3ZTRjMTA5MmVmZWU0MDkxZGI2NTFlOTI0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tagihan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tagihan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tagihan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tagihan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tagihan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tagihan" data-method="GET"
      data-path="admin/tagihan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tagihan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tagihan"
                    onclick="tryItOut('GETadmin-tagihan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tagihan"
                    onclick="cancelTryOut('GETadmin-tagihan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tagihan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tagihan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tagihan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tagihan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETadmin-tagihan"
               value="architecto"
               data-component="query">
    <br>
<p>Opsional. Kata kunci pencarian. Example: <code>architecto</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETadmin-tagihan-create">Menampilkan form pembuatan tagihan.</h2>

<p>
</p>

<p>Hanya menampilkan data penggunaan yang belum memiliki tagihan.</p>

<span id="example-requests-GETadmin-tagihan-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tagihan/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tagihan-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IktCQ1hCUXJZN3VKMWk2RVhGUGtaclE9PSIsInZhbHVlIjoiUEk5V2RSOFJXWFkzc05BczhpM1lUK0ZVRVZZeXFGT3A3Z05CWjZOSm1ZOC9kUklXRXdraVV5dncxVnRlTkJCM091dnpuZThGeHZ1dVVOTmpiWVVnYUtPYklQS1RGeEY4NHpzb3dmUVRzRnI5ZDVJMXI0YUxzNXJOdS9wQ3VZTHQiLCJtYWMiOiIzZjI4NDQwM2QwNzVkOTZkNDVjOTZhOTdlOWYzNGY2MDM1ZTY4YmQ0ZDMwY2UzZDIxZWVlZGZlMjI2ZDU4MmUyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjZ6YjZ5UlBQQTFCY2VMeDRvSmplOHc9PSIsInZhbHVlIjoiNDB6TVFzeEVSNXVib2srOWpBSk4ydDRraHdFZlpWVjA0WXZXUHlJWkl4ZlRNaXlscHlBaE1ZL2EyL01iSVphSHVFb3FSdW5TNjFnK21Jblg3b0k5TVNWQXRWRnBLNGpsVHhxUERkZDhua2VGY2VSdmpxUk9vSGxUTUwzc29nWmEiLCJtYWMiOiI4MDAwOGFhMTU0ZjA2ZmQ1ODIxYmJkMjgzM2ViYzg2YTRlM2M4Yjg1NjY5M2E2MjQzOTdkYTgxMDI1YmFjMDNjIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tagihan-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tagihan-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tagihan-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tagihan-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tagihan-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tagihan-create" data-method="GET"
      data-path="admin/tagihan/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tagihan-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tagihan-create"
                    onclick="tryItOut('GETadmin-tagihan-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tagihan-create"
                    onclick="cancelTryOut('GETadmin-tagihan-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tagihan-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tagihan/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tagihan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tagihan-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-tagihan">Menyimpan data tagihan baru.</h2>

<p>
</p>

<p>Sistem akan otomatis menghitung:</p>
<ul>
<li>jumlah meter (meter_akhir - meter_awal)</li>
<li>jumlah biaya berdasarkan tarif pelanggan</li>
</ul>

<span id="example-requests-POSTadmin-tagihan">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/tagihan" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"penggunaan_id\": 16,
    \"status\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "penggunaan_id": 16,
    "status": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-tagihan">
</span>
<span id="execution-results-POSTadmin-tagihan" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-tagihan"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-tagihan"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-tagihan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-tagihan">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-tagihan" data-method="POST"
      data-path="admin/tagihan"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-tagihan', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-tagihan"
                    onclick="tryItOut('POSTadmin-tagihan');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-tagihan"
                    onclick="cancelTryOut('POSTadmin-tagihan');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-tagihan"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/tagihan</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-tagihan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-tagihan"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>penggunaan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="penggunaan_id"                data-endpoint="POSTadmin-tagihan"
               value="16"
               data-component="body">
    <br>
<p>ID penggunaan. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTadmin-tagihan"
               value="architecto"
               data-component="body">
    <br>
<p>Status tagihan (paid/unpaid/pending). Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETadmin-tagihan--tagihan_id--edit">Menampilkan form edit tagihan.</h2>

<p>
</p>



<span id="example-requests-GETadmin-tagihan--tagihan_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/tagihan/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-tagihan--tagihan_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlhPU2Q2NkIrb2QvNCttZFhPb0ZLdVE9PSIsInZhbHVlIjoiU0tWcnhhWDN0b0UxZnUyM1ZFc1hVRWpnUTNQTjBzTkxXYnBxTjNYWnZxUGpzVm9pTm53YkVGTU5lKzZlbWFmalV4clpMcU5TTXUwSXdDMjR0bitReFJOTFgrdWhmSlBkeFByWjgxVCt5L2g0dXV5ME1ESWFSTUJXSi81MmpPSnkiLCJtYWMiOiI5ZDkyMWYzM2E5NTZjNTZmOTExODRhNjg0Mjc0ZTljYmYzZGE5MGRhNzhhNWE3ZDdkNzMzNzk3ZTY0MzNjMGFlIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6Im1ldDhUVVZFRHFzQzM3aDlxTFZxVUE9PSIsInZhbHVlIjoiNmh3dEdWMThTSGdibkV6ZTlHVHNETW5kZzVnSHROYnNzdkorNzRRUnhMSDRraExmVWppZWYzZ1ZnNG0yNFpEclVhRXNHYW1ZUXZmVnorck5GKyttZE1saVZRTys1WCtwdzB1eDZwU3BxcnlCWHlUV0tUQzY1RGh3eUkvSkhRVkwiLCJtYWMiOiIyMGVmMTBlNWE0MzAyNTljZTVhZjk1ZGIzNzI4NzRjODk5YWU4ZWIxY2VjZWNkODAyZGYwM2Y2NGVmN2EwZGI1IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-tagihan--tagihan_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-tagihan--tagihan_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-tagihan--tagihan_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-tagihan--tagihan_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-tagihan--tagihan_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-tagihan--tagihan_id--edit" data-method="GET"
      data-path="admin/tagihan/{tagihan_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-tagihan--tagihan_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-tagihan--tagihan_id--edit"
                    onclick="tryItOut('GETadmin-tagihan--tagihan_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-tagihan--tagihan_id--edit"
                    onclick="cancelTryOut('GETadmin-tagihan--tagihan_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-tagihan--tagihan_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/tagihan/{tagihan_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-tagihan--tagihan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-tagihan--tagihan_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>tagihan_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="tagihan_id"                data-endpoint="GETadmin-tagihan--tagihan_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tagihan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-tagihan--id-">Memperbarui data tagihan.</h2>

<p>
</p>

<p>Hanya memperbarui status tagihan.</p>

<span id="example-requests-PUTadmin-tagihan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/tagihan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-tagihan--id-">
</span>
<span id="execution-results-PUTadmin-tagihan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-tagihan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-tagihan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-tagihan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-tagihan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-tagihan--id-" data-method="PUT"
      data-path="admin/tagihan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-tagihan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-tagihan--id-"
                    onclick="tryItOut('PUTadmin-tagihan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-tagihan--id-"
                    onclick="cancelTryOut('PUTadmin-tagihan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-tagihan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/tagihan/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/tagihan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-tagihan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-tagihan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-tagihan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tagihan. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTadmin-tagihan--id-"
               value="architecto"
               data-component="body">
    <br>
<p>Status terbaru. Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEadmin-tagihan--id-">Menghapus data tagihan.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-tagihan--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/tagihan/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/tagihan/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-tagihan--id-">
</span>
<span id="execution-results-DELETEadmin-tagihan--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-tagihan--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-tagihan--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-tagihan--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-tagihan--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-tagihan--id-" data-method="DELETE"
      data-path="admin/tagihan/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-tagihan--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-tagihan--id-"
                    onclick="tryItOut('DELETEadmin-tagihan--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-tagihan--id-"
                    onclick="cancelTryOut('DELETEadmin-tagihan--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-tagihan--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/tagihan/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-tagihan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-tagihan--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-tagihan--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the tagihan. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-pembayaran">Menampilkan daftar pembayaran dengan fitur pencarian dan pagination.</h2>

<p>
</p>



<span id="example-requests-GETadmin-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pembayaran" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pembayaran">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImRkeEVBcnowYkl4Z0pmcXZWWFU4ZEE9PSIsInZhbHVlIjoiN2V4VTBpYXRwbkp1eWFzTVY5R0wwS2RqU3FQY3BnQzlEOGZlZit4TGNLem0xdEZ0NmhwUGlCZ3FBenNpaUgyWkxCVUZ6ZTFwSkZFTUovTzlsUXQ1aU04eG5kV1hvQW1yc1oxQ0pqNlFuN1hPR3pVVFUzbWhmMVNyNWZ3SXJNdHMiLCJtYWMiOiI4MGYxMjFhNWQ5YWIzMmU3ZmQyOWRkOWZiMTYzYjFkNmI3YjZlZDA2MzJiYmNiYWE0NGJiNjEzOTdlMjhlOWMyIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IlNFZEYzVXI3OENIc0xhTXhwTDZGSGc9PSIsInZhbHVlIjoib3FnNUlXLzJwSWZZbUZnd2NMQWJpWUpaRDBHMnZ0OFliNG5SNWRRRG01a3c2WUEvT3JuYkNadzA2WXVUazdsUTlJVisyaHV3bmlOWG1ic3lKdVJpdjIyV3ZJSmtzaHFBU0wrYmsxL0FXY0xUVTBnWHR2NUNyODdSWFNRTkkzVWgiLCJtYWMiOiJiMDQ4MjFiYzJmOWVlZTJiNjgzMzZkNmE5NWZjZjgwOGFkM2M2Y2Y1Mjg4YWVmNjhjZTMwYTZmNWEzZTNlNjg4IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pembayaran" data-method="GET"
      data-path="admin/pembayaran"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pembayaran"
                    onclick="tryItOut('GETadmin-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pembayaran"
                    onclick="cancelTryOut('GETadmin-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-pembayaran-create">GET admin/pembayaran/create</h2>

<p>
</p>



<span id="example-requests-GETadmin-pembayaran-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pembayaran/create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran/create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pembayaran-create">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IkVuM2wzVUhEUkhFK0lDTDNWRVIralE9PSIsInZhbHVlIjoiRmN4UDRyMUdPcHNHeENvWE1GWkk4Ly9tN0JkaEd1ajYyVjh0VG1RQ21MdEYvc09VdmovZ1BSTyswVlFiZHFseE9yMWRndnlMVkFjNElFS1JybkdHUUpoaE1acDJ1N1duT3UvLzZhQUNTTDdZdnFrSmQyTDFRZk51SjBBNXFWMzYiLCJtYWMiOiI2Njc4NDU0NDhjYTExYmFiMTliNDEyNmJmNGQ1OTY0ZDc5ZTZjYjY1OTAxZmVkNjgwYWE0ZTczNjNlNDMwMTNkIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6InQrakNVNFpDbVZ4YTFwT0hxdWdKNHc9PSIsInZhbHVlIjoieVdUazdzdSs2L1RvQ1ZBOXJUaW9rT2pTb0pERTFQYTlOdld1QmM3VzNSNjVsU1ZWK09VekkrbzFPMTJTUFZDVXI4RDZjV0ZsZktOaWYva0hzdEpvb1lLK3duZk1XcWNZdXFSR2gzU29VYWVqeitXR3hNY3RPaTBEWWtMWi9Wa0QiLCJtYWMiOiI4MjQ4MWRhZDM1M2MxYWNkNzFmYTk5MDY5NDJhMjA4NjVkYzkzYjk2NzRiZGEzZWUyMWIwYTQwNzljNzZmYTg4IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pembayaran-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pembayaran-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pembayaran-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pembayaran-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pembayaran-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pembayaran-create" data-method="GET"
      data-path="admin/pembayaran/create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pembayaran-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pembayaran-create"
                    onclick="tryItOut('GETadmin-pembayaran-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pembayaran-create"
                    onclick="cancelTryOut('GETadmin-pembayaran-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pembayaran-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pembayaran/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pembayaran-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pembayaran-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTadmin-pembayaran">POST admin/pembayaran</h2>

<p>
</p>



<span id="example-requests-POSTadmin-pembayaran">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/admin/pembayaran" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-pembayaran">
</span>
<span id="execution-results-POSTadmin-pembayaran" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-pembayaran"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-pembayaran"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-pembayaran" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-pembayaran">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-pembayaran" data-method="POST"
      data-path="admin/pembayaran"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-pembayaran', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-pembayaran"
                    onclick="tryItOut('POSTadmin-pembayaran');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-pembayaran"
                    onclick="cancelTryOut('POSTadmin-pembayaran');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-pembayaran"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/pembayaran</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-pembayaran"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-pembayaran--pembayaran_id--edit">GET admin/pembayaran/{pembayaran_id}/edit</h2>

<p>
</p>



<span id="example-requests-GETadmin-pembayaran--pembayaran_id--edit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/admin/pembayaran/1/edit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran/1/edit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-pembayaran--pembayaran_id--edit">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImJtZFZHMmc1ak5IYml4M1padE1rN0E9PSIsInZhbHVlIjoiUmVQMlR5cXNYWHR5QVJFOG5ERFByTXdWUS9QZ1ZFaERHM0RWaldMYU95YUxwWjhOcGx1ZzNlYkxsVm92NCtwY3JOWnl4anNFNzZKbDVsVHJhL1p4ZUdscE42QXFIb2NmR0RFWkZQMnI5QnhhQS93T1FmOWNIRzhyMDNYUXZIRU4iLCJtYWMiOiJmMDYyODhiNTI2M2YxYmEzMmQ0YmVlNGE4MDZlMzMxZjhkOWZmOTI3MjZmZjg3YWU2NGViMmEwMDhkOTY5MTBlIiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; samesite=lax; aplikasi-pembayaran-listrik-pascabayar-session=eyJpdiI6IjQ4MUFpcjVONXh5VklLL016T1lFbWc9PSIsInZhbHVlIjoiRyswT2NjZk9oTVN4cjU2VkdkYVhxTk5qcnVKamgvc2ZWU01yQ0YrRFM3WEs3akh5U0g1eG14aCtjMTd2L01IQ2RWQ2hEZVg4bkdwUHlSeXZwbXVUaVdKYjN0QTBIb1B3Uk55Z1lJTENCcWZENjlOdk8vajQyc2s1dmViRFN5YlEiLCJtYWMiOiIzNDY2MTgwNTJlZDc4Nzc1NzJlMmM0YTAwZWQ0YTExZWIxZjFlNDY5NjI3ZmE5MGQ3MGYyZmUyZjg4ZWM2ZjA0IiwidGFnIjoiIn0%3D; expires=Sat, 02 May 2026 07:57:38 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-pembayaran--pembayaran_id--edit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-pembayaran--pembayaran_id--edit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-pembayaran--pembayaran_id--edit"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-pembayaran--pembayaran_id--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-pembayaran--pembayaran_id--edit">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-pembayaran--pembayaran_id--edit" data-method="GET"
      data-path="admin/pembayaran/{pembayaran_id}/edit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-pembayaran--pembayaran_id--edit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-pembayaran--pembayaran_id--edit"
                    onclick="tryItOut('GETadmin-pembayaran--pembayaran_id--edit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-pembayaran--pembayaran_id--edit"
                    onclick="cancelTryOut('GETadmin-pembayaran--pembayaran_id--edit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-pembayaran--pembayaran_id--edit"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/pembayaran/{pembayaran_id}/edit</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-pembayaran--pembayaran_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-pembayaran--pembayaran_id--edit"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pembayaran_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="pembayaran_id"                data-endpoint="GETadmin-pembayaran--pembayaran_id--edit"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTadmin-pembayaran--id-">PUT admin/pembayaran/{id}</h2>

<p>
</p>



<span id="example-requests-PUTadmin-pembayaran--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/admin/pembayaran/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-pembayaran--id-">
</span>
<span id="execution-results-PUTadmin-pembayaran--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-pembayaran--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-pembayaran--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-pembayaran--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-pembayaran--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-pembayaran--id-" data-method="PUT"
      data-path="admin/pembayaran/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-pembayaran--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-pembayaran--id-"
                    onclick="tryItOut('PUTadmin-pembayaran--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-pembayaran--id-"
                    onclick="cancelTryOut('PUTadmin-pembayaran--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-pembayaran--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/pembayaran/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>admin/pembayaran/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-pembayaran--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEadmin-pembayaran--id-">Menghapus pembayaran dari database.</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-pembayaran--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/admin/pembayaran/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/admin/pembayaran/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-pembayaran--id-">
</span>
<span id="execution-results-DELETEadmin-pembayaran--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-pembayaran--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-pembayaran--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-pembayaran--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-pembayaran--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-pembayaran--id-" data-method="DELETE"
      data-path="admin/pembayaran/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-pembayaran--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-pembayaran--id-"
                    onclick="tryItOut('DELETEadmin-pembayaran--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-pembayaran--id-"
                    onclick="cancelTryOut('DELETEadmin-pembayaran--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-pembayaran--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/pembayaran/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-pembayaran--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-pembayaran--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the pembayaran. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
