import Image from 'next/image'
import Logo from '../composants/logo'

export default function Home() {
  return (
    <main className="flex min-h-screen flex-col items-left justify-between p-24">
    <header>
      <Logo />
    </header>
    <section className="flex flex-col items-center">
      <h1 className="text-3xl font-bold mb-4">Homepage</h1>
      {/* Autres éléments de la page ici */}
    </section>
  </main>
  )
}
