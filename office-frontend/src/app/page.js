"use client";
import { useState } from "react";
import Stars from '@/components/stars';

export default function Home() {
  const [temperature, setTemperature] = useState("temperature-1");
  const [humidity, setHumidity] = useState("humidity-1");
  const [broken, setBroken] = useState("broken-1");

  return (
    <main className="flex min-h-screen flex-col items-center p-24 bg-white">
      <h1 className="text-[#22577a] font-['Arial'] text-4xl leading-[normal] mb-[60px]">
        Votre avis
      </h1>
      <div className="flex flex-col items-start">
        <div className="text-[#22577a] font-['Roboto'] text-2xl leading-[normal] font-medium mb-[45px]">
          État des produits
        </div>
        <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
          <div className="text-black font-['Roboto'] leading-[normal]">
            Température
          </div>
          <div className="flex items-start">
            <div className="flex items-center mr-[76px]">
              <div className="flex items-center mb-4">
                <input
                  id="temperature-1"
                  type="radio"
                  checked={temperature === "temperature-1"}
                  onChange={() => {
                    setTemperature("temperature-1");
                  }}
                  name="temperature"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="temperature-1"
                  className="text-black font-['Roboto'] leading-[normal] ms-2"
                >
                  Correcte
                </label>
              </div>
            </div>
            <div className="flex items-center">
              <div className="flex items-center mb-4">
                <input
                  id="temperature-2"
                  type="radio"
                  checked={temperature === "temperature-2"}
                  onChange={() => {
                    setTemperature("temperature-2");
                  }}
                  name="temperature"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="temperature-2"
                  className="text-black font-['Roboto'] leading-[normal] ms-2 "
                >
                  Incorrecte
                </label>
              </div>
            </div>
          </div>
        </div>

        <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
          <div className="text-black font-['Roboto'] leading-[normal]">
            Humidité
          </div>
          <div className="flex items-start">
            <div className="flex items-center mr-[76px]">
              <div className="flex items-center mb-4">
                <input
                  id="humidity-1"
                  type="radio"
                  checked={humidity === "humidity-1"}
                  onChange={() => {
                    setHumidity("humidity-1");
                  }}
                  name="humidity"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="humidity-1"
                  className="text-black font-['Roboto'] leading-[normal] ms-2"
                >
                  Correcte
                </label>
              </div>
            </div>
            <div className="flex items-center">
              <div className="flex items-center mb-4">
                <input
                  id="humidity-2"
                  type="radio"
                  checked={humidity === "humidity-2"}
                  onChange={() => {
                    setHumidity("humidity-2");
                  }}
                  name="humidity"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="humidity-2"
                  className="text-black font-['Roboto'] leading-[normal] ms-2 "
                >
                  Incorrecte
                </label>
              </div>
            </div>
          </div>
        </div>

        <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
          <div className="text-black font-['Roboto'] leading-[normal]">
            Produits cassés
          </div>
          <div className="flex items-start">
            <div className="flex items-center mr-[76px]">
              <div className="flex items-center mb-4">
                <input
                  id="broken-1"
                  type="radio"
                  checked={broken === "broken-1"}
                  onChange={() => {
                    setBroken("broken-1");
                  }}
                  name="broken"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="broken-1"
                  className="text-black font-['Roboto'] leading-[normal] ms-2"
                >
                  Correcte
                </label>
              </div>
            </div>
            <div className="flex items-center">
              <div className="flex items-center mb-4">
                <input
                  id="broken-2"
                  type="radio"
                  checked={broken === "broken-2"}
                  onChange={() => {
                    setBroken("broken-2");
                  }}
                  name="broken"
                  className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                />
                <label
                  htmlFor="broken-2"
                  className="text-black font-['Roboto'] leading-[normal] ms-2 "
                >
                  Incorrecte
                </label>
              </div>
            </div>
          </div>
        </div>

        <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
          <div className="flex items-center text-black font-['Roboto'] leading-[normal]">
            Évaluez votre expérience de livraison{" "}
            <div className="flex items-start ml-[33px]">
              <Stars clicked />
              <Stars hovered />
              <Stars />
              <Stars />
              <Stars />
            </div>
          </div>
        </div>

        <button
          type="button"
          className="w-full inline-flex justify-center items-center gap-2.5 p-2.5 p-2 rounded bg-[#57cc99] text-[#22577a] font-['Roboto'] font-medium leading-[normal]"
        >
          Envoyer
        </button>
      </div>
    </main>
  );
}
