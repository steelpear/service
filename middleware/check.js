export default function ({ app, redirect }) {
  const cookieRes = app.$cookies.get('_qHWj5dMs-p23yBpaJ')
  if (cookieRes) { return redirect('/admin') }
}
