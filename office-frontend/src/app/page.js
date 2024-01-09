import Image from 'next/image'
import ButtonUsage from '@/components/button'

export default function Home() {
  return (
    <main>
      <section>
        <div className="flex items-right justify-between"> <ButtonUsage /></div>
      </section>
    <section className="flex flex-col items-left p-20">
      <h2 className="text-4xl font-bold mb-4">Suivez et améliorez votre
      <br/>satisfaction client avec</h2>
    </section>
  </main>
  )
}
