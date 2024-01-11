"use client";
import { useState } from "react";
import * as React from 'react';
import Box from '@mui/material/Box';
import Rating from '@mui/material/Rating';

import Stack from '@mui/material/Stack';


export default function HoverRating() {
    const [broken, setBroken] = useState("broken-1");

    const [value, setValue] = React.useState(1);

    return (
        <main className="flex min-h-screen flex-col items-center p-24 bg-white">
            <h1 className="text-[#22577a] text-4xl leading-[normal] mb-[60px]">
                Votre avis
            </h1>
            <div className="flex flex-col items-start">

                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="text-black leading-[normal]">
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
                                    className="text-black leading-[normal] ms-2"
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
                                    className="text-black leading-[normal] ms-2 "
                                >
                                    Incorrecte
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="flex items-center text-black leading-[normal]">
                        Évaluez votre expérience de livraison{" "}
                        <div className="flex items-start ml-[33px]">
                            <Stack spacing={1}>
                                <Rating name="half-rating" defaultValue={1} precision={0.5} />
                            </Stack>
                        </div>
                    </div>
                </div>
                <div className="shadow-md shadow-[#00000040] flex flex-col items-start gap-7 pt-[1.5625rem] pr-[1.5625rem] pb-[1.5625rem] pl-[1.5625rem] w-[774px] rounded-md bg-neutral-50 mb-[30px]">
                    <div className="flex items-center text-black leading-[normal]">
                        À quel niveau nous recommander-vous ?{" "}
                        <div className="flex items-start ml-[33px]">
                            <Box
                                sx={{
                                    '& > legend': { mt: 2 },
                                }}
                            >
                                <Rating
                                    name="simple-controlled"
                                    value={value}
                                    precision={0.5}
                                    onChange={(event, newValue) => {
                                        setValue(newValue);
                                    }}
                                />
                            </Box>
                        </div>
                    </div>
                </div>

                <button
                    type="button"
                    className="w-full inline-flex justify-center items-center gap-2.5 p-2.5 p-2 rounded bg-[#57cc99] text-[#22577a] font-medium leading-[normal]"
                >
                    Envoyer
                </button>
            </div>
        </main>
    );
}
