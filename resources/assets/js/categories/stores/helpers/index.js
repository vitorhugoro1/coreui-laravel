import {findIndex} from 'lodash';

export const isValidWeight = (weights, weight, id) => {
  let hasInitial = findIndex(weights, {
    min: weight.min
  });

  let hasMax = findIndex(weights, {
    max: weight.max
  });

  if (id !== undefined) {
    if (hasMax === id || hasInitial === id) {
      return true;
    }
  }

  return hasInitial < 0 && hasMax < 0;
};

export const isValidForm = (forms, form, id) => {
  let hasNamed = findIndex(forms, {
    name: form.name
  });

  if (id !== undefined) {
    if (hasNamed === id) {
      return true;
    }
  }

  return hasNamed < 0;
};