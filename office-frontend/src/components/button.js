import * as React from 'react';
import Button from '@mui/material/Button';
import { ThemeProvider } from "@mui/material/styles";
import { theme } from "../app/theme";
import Link from 'next/link';

export default function ButtonUsage({ buttonText, as }) {
  return (
    <ThemeProvider theme={theme}>
      {as ? (
        <Link href={as} passHref>
          <Button style={{ backgroundColor: theme.palette.secondary.main, color: theme.palette.primary.main, }}
            variant="contained">
            {buttonText}
          </Button>
        </Link>
      ) : (
        <Button
          style={{ backgroundColor: theme.palette.secondary.main, color: theme.palette.primary.main, }}
          variant="contained">
          {buttonText}
        </Button>
      )}
    </ThemeProvider>
  );
}


