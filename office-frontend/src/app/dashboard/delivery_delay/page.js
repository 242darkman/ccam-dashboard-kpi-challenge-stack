"use client";

import React, { useEffect, useState } from 'react';

import Box from "@mui/material/Box";
import CircularProgress from '@mui/material/CircularProgress';
import Grid from '@mui/material/Grid';
import LeftNav from "@/components/LeftNav";
import PieChart from "@/app/_graph/PieChart";
import { ThemeProvider } from "@mui/material/styles";
import Typography from '@mui/material/Typography';
import get from 'lodash/get.js';
import { getDaytimeDeliveriesRate } from '@/app/_api/delivery/delivery.api.js';
import { theme } from "../../theme";

export default function DeliveryDelay() {
  const [isLoading, setIsLoading] = useState(true);
  const [error, setError] = useState(null);
  const [pieChartData, setPieChartData] = useState(null);

  useEffect(() => {
    async function fetchDashboardeliveryDelay() {
      try {
        const pieChartDataResponse = await getDaytimeDeliveriesRate();

        const pieChartData = get(pieChartDataResponse, 'dayTimeDelivery') || {};

        setPieChartData(pieChartData);
        
      } catch (err) {
        console.error("Erreur lors du chargement des données:", err);
        setError(err.toString());
      } finally {
        setIsLoading(false);
      }
    }

    fetchDashboardeliveryDelay();
  }, []);
  
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
            {isLoading ? (
              <Grid
                container direction="column"
                justifyContent="center"
                alignItems="center"
                style={{ minHeight: '100vh' }}
              >
                <CircularProgress />
              </Grid>
            ) : null}

            {error ? (
              <Grid container direction="column" justifyContent="center" alignItems="center" style={{ minHeight: '100vh' }}>
                <Typography variant="h6">Une erreur s'est produite :</Typography>
                <Typography variant="body1">{ error }</Typography>
              </Grid>
            ) : null}

            {pieChartData && <PieChart data={pieChartData} title="Taux de livraison effectués par jour et par nuit"/>}
          </Box>
        </LeftNav>
      </div>
    </ThemeProvider>
    );
}