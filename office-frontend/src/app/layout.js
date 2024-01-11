
// layout.js
import { Inter } from "next/font/google";
import Head from "next/head";
import "./globals.css";
import Logo from "../assets/logo.png";
import Image from "next/image";

const inter = Inter({ subsets: ["latin"] });

export default function RootLayout({ children, logo, showButton }) {
  return (
    <html lang="en">
      <body>
        <header>
          <div className="logo p-3">
            <Image priority src={Logo} alt="My-App-Logo" />
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
