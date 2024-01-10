"use client";
import { useState } from "react";


export default function HoverRating() {
    const [typeDemande, setTypeDemande] = useState("demande-1");
    const [idLivraison, setIdLivraison] = useState("humidity-1");
    const [message, setMessage] = useState("");

    return (
        <main className="flex min-h-screen flex-col items-center p-24 bg-white">
            <h1 className="text-[#22577a] font-['Arial'] text-4xl leading-[normal] mb-[60px]">
                Retours et réclamation
            </h1>
            <div className="flex flex-col items-start">
                {/* Type Demande */}
                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="text-black font-['Roboto'] leading-[normal]">
                        Spécifier le type de votre demand
                    </div>
                    <div className="flex items-start">
                        <select
                            value={typeDemande}
                            onChange={(e) => setTypeDemande(e.target.value)}
                            className="w-[350px] h-[40px] text-black bg-white border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600"
                        >
                            <option value="temperature-1">Correcte</option>
                            <option value="temperature-2">Incorrecte</option>
                        </select>
                    </div>
                </div>

                {/* Humidité */}
                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="text-black font-['Roboto'] leading-[normal]">
                        Identifiant de la livraison
                    </div>
                    <div className="flex items-start">
                        <select
                            value={idLivraison}
                            onChange={(e) => setIdLivraison(e.target.value)}
                            className="w-[350px] h-[40px] text-black bg-white border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600"
                        >
                            <option value="humidity-1">Correcte</option>
                            <option value="humidity-2">Incorrecte</option>
                        </select>
                    </div>
                </div>

                {/* Champ de texte long pour le message */}
                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="text-black font-['Roboto'] leading-[normal]">
                        Votre Message
                    </div>
                    <textarea
                        value={message}
                        onChange={(e) => setMessage(e.target.value)}
                        className="w-[100%] h-[120px] text-black bg-white border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600 resize-none"
                    ></textarea>
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
