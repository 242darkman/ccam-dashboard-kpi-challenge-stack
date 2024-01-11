"use client";

import React, { useEffect, useState } from "react";
import { getOrders } from "../_api/order/order.api";
import RootLayout from "../layout";
import Logo from "@/assets/logo.png";

export default function Order() {
  const [orders, setOrders] = useState([]);

  useEffect(() => {
    console.log("avant");
    const fetOrders = async () => {
      try {
        const response = await getOrders();
        console.log("après ", response);
        setOrders(response.data);
      } catch (error) {
        console.error(
          "Une erreur s'est produite lors de la récupération des commandes",
          error
        );
      }
    };

    fetOrders();
  }, []);

  return (
    <div>
      {/* <RootLayout >
            <h1 className="text-center"> Mes Commandes </h1>
        </RootLayout> */}
      <h1 className="text-center"> Mes Commandes </h1>
    </div>
  );
}
