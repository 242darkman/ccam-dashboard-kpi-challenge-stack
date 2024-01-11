'use client';
import { Inter } from 'next/font/google';
import Head from 'next/head'; 
import './globals.css';
import logo from '../assets/logo.png';
import Image from 'next/image';
import ButtonUsage from '@/components/button';

const inter = Inter({ subsets: ['latin'] })

export default function RootLayout({ children, logo, showButton }) {
  return (
    <html lang="en">
      <body>
        <header className="flex justify-between items-center p-3 m-5" style={{ backgroundColor: 'white' }}>
          <div className="flex logo">
            <Image src={logo} alt="My App Logo" />
          </div>
          {showButton && (
            <div className="flex items-center ml-auto p-3">
              <ButtonUsage buttonText="Mon compte" />
            </div>
          )}
        </header>
        <main>
          {children}
        </main>
        <style jsx global>{`
          body {
            background-color: white;
            margin: 0;
            padding: 0;
          }
        `}</style>
      </body>
    </html>
  );
}
