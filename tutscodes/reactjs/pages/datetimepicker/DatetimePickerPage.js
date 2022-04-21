import React, { useState } from "react";
import Datetime from "react-datetime";
import "react-datetime/css/react-datetime.css";

function DatetimePickerPage() { 

  return (
    <>
      <p>Example of a React Date Time Picker</p>
      <Datetime 
        className="input-ui" 
        dateFormat = "DD/MM/YYYY"
      />
    </>
  );
}
export default DatetimePickerPage;