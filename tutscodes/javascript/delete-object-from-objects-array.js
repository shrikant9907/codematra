export const deleteAnObjectFromArray = (data, value, field = 'id') => {
  return data.filter((item) => item[field] !== value)
}