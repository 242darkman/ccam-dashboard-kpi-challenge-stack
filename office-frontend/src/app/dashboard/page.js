"use client";
import LeftNav from "@/components/LeftNav";
import { ThemeProvider } from "@mui/material/styles";
import { theme } from "../theme";

export default function Dashboard() {
  return (
    <ThemeProvider theme={theme}>
      <div>
        <LeftNav />
      </div>
    </ThemeProvider>
  );
}
