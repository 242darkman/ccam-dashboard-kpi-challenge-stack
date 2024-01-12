import * as api from "@/app/_utils/api.js";

import axios from "axios";

export async function getQuestions() {
  const request = await api.createApiRequestInstance({
    path: "/api/questions/get-questions",
    method: "GET",
  });
  const response = await axios(request);
  console.log("les questions ", response.data);
  return response.data;
}
