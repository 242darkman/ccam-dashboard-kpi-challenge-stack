"use client";
import LeftNav from "@/components/LeftNav";
import KPIContainer from "@/components/KPIContainer";
import { ThemeProvider } from "@mui/material/styles";
import { theme } from "../theme";
import Box from "@mui/material/Box";

export default function Dashboard() {
  return (
    <ThemeProvider theme={theme}>
      <div>
        <LeftNav>
          <Box
            display="flex"
            justifyContent="space-between"
            gap={2}
            flexWrap="wrap"
          >
            <KPIContainer title="Note de satisfaction moyenne" kpi="4,3 / 5" />
            <KPIContainer title="Taux de retours" kpi="30 %" />
            <KPIContainer title="Taux de recomandation" kpi="40 %" />
          </Box>
        </LeftNav>
      </div>
    </ThemeProvider>
  );
}
