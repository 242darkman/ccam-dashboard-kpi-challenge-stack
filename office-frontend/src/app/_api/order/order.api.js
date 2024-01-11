import * as api from "@/app/_utils/api.js";

import axios from "axios";

export async function getOrders() {
  // const request = api.axiosApiInstance({
  //     path: "/api/orders/get-by-customer",
  //     method: "GET",
  // });

  const request = await api.createApiRequestInstance({
    path: "/api/orders/get-by-customer",
    method: "GET",
  });
  const response = await axios(request);
  console.log("data est ", response.data);
  return response.data;
}
