'use client';
import Image from 'next/image';
import ButtonUsage from '@/components/button';
import { ThemeProvider } from "@mui/material/styles";
import { theme } from "../app/theme";
import Img from '../assets/imagelogo.png';
import RootLayout from './layout';
import Logo from '@/assets/logo.png';
import Graph from '../assets/Rectangle21.png';
import Link from 'next/link';

export default function Home() {
  return (
    <RootLayout logo={Logo} showButton={true}>
      <main style={{ backgroundColor: 'white' }}>
        <section className="flex flex-col items-left ml-10 pl-20">
          <h2 className="text-4xl font-bold m-4" style={{ color: "#22577A" }}>
            Suivez et améliorez votre<br />satisfaction client avec
          </h2>
        </section>
        <section className='flex'>
          <div className='flex-col' style={{ marginLeft: '250px', padding: '10px' }}>
            <div>
              <Image src={Img} alt='Image Logo' width={150} height={150} />
            </div>
            <div>
              <Link href="/login" passHref>
                <ButtonUsage buttonText="Se connecter" as="/login" />
              </Link>
            </div>
          </div>
          <section>
            <div style={{ marginLeft: '252px' }}>
              <Image src={Graph} alt='Graph' width={500} height={500} />
            </div>
          </section>
        </section>
      </main>
    </RootLayout>
  );
}