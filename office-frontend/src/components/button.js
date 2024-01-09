import * as React from 'react';
import Button from '@mui/material/Button';

export default function ButtonUsage() {
  const buttonStyle = {
    background: '#57CC99',
    color: '#22577A', 
    width: '5px',
  };
  return (
    <Button variant="contained" style={buttonStyle}>
      Mon compte
    </Button>
  );
}
