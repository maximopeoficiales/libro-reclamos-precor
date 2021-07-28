@includeIf('email.header', ['reclamo' => $reclamo])


@yield('body')


@includeIf('email.footer', ['reclamo' => $reclamo])
