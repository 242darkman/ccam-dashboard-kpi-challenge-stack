"use client";
import Image from 'next/image'
import ButtonUsage from '@/components/button'
import { theme } from "./theme";

export default function Home() {
  return (
    <main>
      <section>
        <div className="flex justify-end"> <ButtonUsage buttonText="Mon compte" /></div>
      </section>
      <section className="flex flex-col items-left p-20">
        <h2 className="text-4xl font-bold mb-4">Suivez et améliorez votre
          <br />satisfaction client avec</h2>
      </section>
    </main>
  )
}
